
function addToCartAlert()
{
  alert("Item added!");

// if( document.getElementById('iphoneX').style.backgroundColor == "green")
// {
//   document.getElementById('listOfItems').value += "iPhone X ";
// }
// if( document.getElementById('iphone8').style.backgroundColor == "green")
// {
//   document.getElementById('listOfItems').value += "iPhone 8 ";
// }
// if( document.getElementById('s8').style.backgroundColor == "green")
// {
//   document.getElementById('listOfItems').value += "Samsung Galaxy S8 ";
// }
//
//
//
//   document.getElementById('iphoneX').style.backgroundColor = "rgba(0,0,0,0.0)";
//   document.getElementById('iphone8').style.backgroundColor = "rgba(0,0,0,0.0)";
//   document.getElementById('s8').style.backgroundColor = "rgba(0,0,0,0.0)";
//   document.getElementById('note8').style.backgroundColor = "rgba(0,0,0,0.0)";
//   document.getElementById('5t').style.backgroundColor = "rgba(0,0,0,0.0)";
//   document.getElementById('pixel').style.backgroundColor = "rgba(0,0,0,0.0)";



}

function selectItem(id)
{
  console.log(id);
  document.getElementById(id).style.backgroundColor = "green";
}

function checkAddress()
{
  if(document.getElementById('numItemsInCart').value == 0)
  {
    alert("You must have at least one item in your cart!");
    event.preventDefault(); // stop form from submitting
    return false;
  }
  else if(document.getElementById('userAddress').value == "" || document.getElementById('userAddress').value == " ")
  {
    alert("Please enter an Address");
    event.preventDefault(); // stop form from submitting
    return false;
  }
  else {
    return true;
  }
}
