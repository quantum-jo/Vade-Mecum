var data;
var title;
var author;
var ImageLink;
var volumeID;

var bookShelf = new Object();
var wrapper = document.getElementById('content');

function findBookData(value) {

  var xhttp = new XMLHttpRequest;
  xhttp.onreadystatechange = function() {

    if(this.readyState == 4 && this.status == 200) {

      while(wrapper.firstChild) {
        wrapper.removeChild(wrapper.firstChild);
      }

      data = JSON.parse(this.responseText);


      if(data.totalItems != 0) {
        var count = (data.totalItems > 5) ? 5 : data.totalItems;

        for(var i = 0; i < count; i++) {
          title = data.items[i].volumeInfo.title;
          author = data.items[i].volumeInfo.authors[0];
          ImageLink = data.items[i].volumeInfo.imageLinks.smallThumbnail;
          volumeID = data.items[i].id;
          addToDOM(i);
        }
      }
    }

  };

  xhttp.open('GET', 'https://www.googleapis.com/books/v1/volumes?q='+value, true);
  xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xhttp.send();
}

function addToDOM(i) {
  var items = document.createElement('div');
  items.setAttribute('class', 'items');
  items.setAttribute('id', i);
    items.setAttribute('onclick', 'addToLibrary(this.id)');

  var img = document.createElement('img');
  img.setAttribute('src', ImageLink);

  var details = document.createElement('div');
  details.setAttribute('class', 'details');

  var titleDiv = document.createElement('div');
  var authorDiv = document.createElement('div');
  var idDiv = document.createElement('div');
  idDiv.setAttribute('id', 'bookVol'+i);
  idDiv.style.display = 'none';


  var titleText = document.createTextNode('Title: '+title);
  var authorText = document.createTextNode('Author: '+author);
  var idText = document.createTextNode(volumeID);

  titleDiv.appendChild(titleText);
  authorDiv.appendChild(authorText);
  idDiv.appendChild(idText);


  items.appendChild(img);

  details.appendChild(titleDiv);
  details.appendChild(authorDiv);
  details.appendChild(idDiv);

  items.appendChild(details);

  wrapper.appendChild(items);

}

function addToLibrary(getID) {
  console.log('enters function');
  var item = document.getElementById(getID);
  item.style.background = "rgb(18, 22, 33)";
  item.style.color = "rgb(255, 255, 255)";

  var value = document.getElementById('bookVol'+getID).innerText;
  console.log(value);

  var xhttp = new XMLHttpRequest;
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      data = JSON.parse(this.responseText);

      bookShelf.title = data.items[0].volumeInfo.title;
      bookShelf.author = data.items[0].volumeInfo.authors[0];
      bookShelf.ImageLink = data.items[0].volumeInfo.imageLinks.smallThumbnail;
      bookShelf.volumeID = data.items[0].id;

      AddBookToTable(bookShelf);
      window.location = 'profile.php';
    }
  };

  xhttp.open('GET', 'https://www.googleapis.com/books/v1/volumes?q='+value, true);
  xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xhttp.send();
}

function AddBookToTable(bookList) {
  var book_title = bookList.title;
  var book_author = bookList.author;
  var book_ImageLink = bookList.ImageLink;
  var book_volumeID = bookList.volumeID;

  var xhttp = new XMLHttpRequest;
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);

    }
  };
  xhttp.open('GET', 'addBook.php?q='+book_title+'&p='+book_author+'&r='+book_ImageLink+'&s='+book_volumeID, true);
  xhttp.send();
}
