$nn("input, textarea").focus( function()
{
	if($nn(this).val() == "Full Name")
	{
		$nn(this).val('');    
	}
	if($nn(this).val() == "Telephone")
	{
		$nn(this).val('');    
	}
	if($nn(this).val() == "Email Address")
	{
		$nn(this).val('');    
	}
	if($nn(this).val() == "Your Enquiry")
	{
		$nn(this).val('');    
	}
});