<html>
<head>
    <meta charset="UTF-8">
    <title> Change Password </title>
    <script> 
        function pass_check(myform)
	        {   
                var old_pass = myform.old_passwd.value;
                var new_pass1 = myform.new_passwd.value;
                var new_pass2 = myform.new_passwd2.value;
                if(old_pass == '' || old_pass == null || new_pass1 == '' || new_pass1 == null ||
                    new_pass2 =='' || new_pass2 == null)
                    alert("Fill all the password fields");
                if (new_pass1 == new_pass2)
                    document.getElementById('submit').click();
		        else
                    alert("New password does not match");
	        }
    </script>
</head>
    <body>
    <h2> Enter Current and New password </h2>
        <form action='change_pswd_helper.php' method='POST'>
            <label for="old_passwd"> <b> Current Password </b> <br/>
                <input type="password" name="old_passwd"> <br/> <br/> 
            </label>
            <label for="new_passwd"> <b> New Password </b> <br/>
                <input type="password" name="new_passwd"> <br/> <br/> 
            </label>
            <label for="new_passwd2"> <b> Re-enter New Password </b> <br/>
                <input type="password" name="new_passwd2"> <br/> <br/> 
            </label>
            <label> 
                <input type="button" onClick="pass_check(this.form)" value="Confirm"> 
            </label>
            <label style="display: none;"> 
                <input id="submit" name="submit" type="submit" value="send" disabled="disabled"> 
            </label>
        </form>
    </body>
</html>