

function confirmLogout()
{
  return confirm("Are you sure you want to logout?");
}


function confirmDeleteTable()
{
  return confirm("Are you sure you want to delete this table?");
}

//for new userpage
function checkBothPasswordsMatch()
{
  if(document.getElementById("passwordFirst").value == document.getElementById("passwordSecond").value)
  {
    //submit form
    return true;
  }
  else
  {
    //show error
    document.getElementById('error').innerHTML = "Both passwords must match";
    return false;
  }
}
