/*
Author: Alexander Yonge
Date Created: October 29, 2017
Class: OOSD Oct 12, 2017
Added features: Timothy Tsia
*/

//confirmation for reset button:
    function confirmReset() 
    {
        return confirm("You are about to reset all fields");
    }

//Validates form fields:
    var validatePost = function(myform) 
    {
         if (myform.postcode.value == "")
        {
            alert("Post Code is required");
             myform.postcode.focus();
            return false;
        }
            //Checks if Post code is valid:
        var reg_postcode = /^[A-VXYa-vxy]\d[A-Za-z]\s?\d[A-Za-z]\d$|^\d{5}(\s\d{4})?8$/i;
        if (!reg_postcode.test(myform.postcode.value))
            {
                alert("Invalid post code!");
                myform.postcode.focus();
                return false;
            }
            //
         if (myform.country.value == "")
        {
            alert("Country Field Required");
             myform.country.focus();
            return false;
        }
        if (myform.province.value == "")
        {
            alert("Province Field Required");
             myform.province.focus();
            return false;
        }
        if (myform.city.value == "")
        {
            alert("City Field Required");
             myform.city.focus();
            return false;
        }
       
        if (myform.address.value == "")
        {
            alert("Address Field Required");
             myform.address.focus();
            return false;
        }
        if (myform.lname.value == "")
        {
            alert("Last Name Field Required");
             myform.lname.focus();
            return false;
        }
        if (myform.fname.value == "")
        {
            alert("First Name Field Required");
             myform.fname.focus();
            return false;
        }    
        if (myform.pass.value == "")
        {
            alert("Password Required");
             myform.pass.focus();
            return false;
        }
        if (myform.userID.value == "")
        {
            alert("ID Field Required");
             myform.userID.focus();
            return false;
        }
        if (myform.hphone.value == "")
        {
            alert("Home Phone Field Required");
             myform.hphone.focus();
            return false;
        }
            // Checks for valid phone number // 
        var reg_phone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        if (!reg_phone.test(myform.hphone.value))
        {
            alert("Invalid Phone Number!");
            myform.hphone.focus();
            return false;
        }
            //
        if (myform.email.value == "")
        {
            alert("Email Field Required");
             myform.email.focus();
            return false;
        }
            // Checks for valid email // 
        var reg_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!reg_email.test(myform.email.value))
        {
            alert("Invalid Email Address!");
            myform.email.focus();
            return false;
        }
            //
        else 
        {
            return confirm("Do you want to submit?");
        }
    }

    //This is for the onfocus event in the form fields
    var fielddescript = ["please enter valid address", "Please enter valid phone #", "Enter a password for your account", "Please Enter the abbreviations of your province"];
  
    function fieldFocus(indexN, fieldId) 
    {                
        x = document.getElementById(fieldId);
        x.style.display = "block";
        x.innerHTML = fielddescript[indexN];                             
    }
    function fieldBlur(fieldId)
    {
        x = document.getElementById(fieldId);
        if (x.style.display === "block")
        {
            x.style.display = "none";
        }
    }

