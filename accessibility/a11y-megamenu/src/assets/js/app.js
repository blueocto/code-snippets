/*
 * The basics
 */

$(document).ready(function() {

  $('[role="region"][aria-hidden="true"]').addClass("hidden");

  $("[role='button']").click(function() {
    // update the ARIA
    $(this).attr("aria-expanded", "true");

    // find adjacent region, which holds the next menu
    $(this).next("[role='region']").attr("aria-expanded", "true").attr("aria-hidden", "false").removeClass("hidden");

    // show the OL menu
    $(this).next("[role='region']").find("> .sub-menu").toggle(display);
  });

});


/*
 * More involved, using hover, functions etc
 */

//look for and hide the current instance of the menu open
//function should fire against the a link in the menu structure
//ele - the a link sibling to the menu
function hideAllMenus(ele) {
  $(ele).attr("aria-expanded", "false");
  $(ele).next(".menu-panel").attr("aria-expanded", "false").attr("aria-hidden", "true").addClass("hidden");
}


function hideAllSubMenus() {
  $(".primary-menu .secondary-menu [aria-expanded='true']").attr('aria-expanded', 'false');
  $(".primary-menu .secondary-menu [aria-hidden='false']").attr('aria-hidden', 'true');
  $(".primary-menu .secondary-menu .tertiary-menu").addClass("hidden");
}

//show the current menu instance
//function should fire against the a link in the menu structure
//ele - the a link sibling to the menu
function showCurrentMenu(ele, isTopLevel) {
  $(ele).attr("aria-expanded", "true");
  $(ele).next(".menu-panel").attr("aria-expanded", "true").attr("aria-hidden", "false").removeClass("hidden");
  // show the 3rd level / tertiary menu for the item you've just clicked on
  $(ele).parent().find(".menu-panel > .tertiary-menu").removeClass("hidden");

  //if top level, open the first secondary menu item in the list
  if (isTopLevel) {
    $(ele).parent().find(".secondary-menu a.has-children").first().click();
  }
}

$(document).ready(function() {
  $("[role='region'][aria-expanded='false']").addClass("hidden");

  $(".primary-menu").on('mouseleave', function() {
    console.log('mouse leave primary menu');
    hideAllSubMenus();
    let e = $(this).find("a[aria-expanded='true']");
    hideAllMenus(e);
  });

  // when we hover the top-level "shop", show the white panel beneath
  $(".primary-menu >li >a.has-children").on('mouseenter click', function() {

    //check to see if the selected menu is already open, so we can close it if so (emulating a toggle)
    if ($(this).attr("aria-expanded") == 'true') {
      hideAllSubMenus();
      hideAllMenus(this);
    } else {
      let isTopLevel = true;
      showCurrentMenu(this, isTopLevel);
    }
  });

  // regardless which button, when clicked, open/close the adjacent panel
  $(".secondary-menu .has-children").on('mouseenter click', function() {
    hideAllSubMenus();
    showCurrentMenu(this);
  });

});