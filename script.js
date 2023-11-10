function validation()
{
    var username = document.getElementById("name").value;
    var password = document.getElementById("pass").value;
    var rp = document.getElementById("re-pass").value;

    if (username.length < 4 || username.length > 10)
    {
        //document.getElementById("validation").innerHTML = "Username must be between 4 to 10 characters.";
        alert("Username must be between 4 to 10 characters.");
    }
    if (password != rp)
    {
        //document.getElementById("validation").innerHTML = 'Password and Repeat Password must be same.'
        alert("Password and Repeat Password must be same.");
        
    }
    else if (password.length < 5)
    {
        alert("Password must be greater than 5 character.");
    }
    else
    {   
        let atSymbol = false;
        let capChar = false;
        let smallChar = false;
        let digit = false;
        let len = password.length;
        for(let i=0; i<len; i++)
        {
            if (password[i] == '@')
            {
                atSymbol = true;
            }
            else if(password[i] >= 0 && password[i] <= 9)
            {
                digit = true;
            }
            else if(password[i] >= 'a' && password[i] <= 'z')
            {
                smallChar = true;
            }
            else if(password[i] >= 'A' && password[i] <= 'Z')
            {
                capChar = true;
            }
        }

        if(atSymbol == true && capChar == true && smallChar == true && digit == true)
        {
            //document.getElementById("validation").innerHTML = "You've chosen a strong password!"
            //alert('joss pass')

        }
        else 
        {
            alert("Please, use the combination of @, [0-9], [A-Z], [a-z] in your password!");
            //alert('Use sothik pass');

        }
    }
}