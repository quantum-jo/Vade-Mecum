var data;
var title;
var author;
var ImageLink;
var volumeID;

var bookShelf = new array();

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
  items.setAttribute('click', 'addToLibrary(this.id)');

  var img = document.createElement('img');
  img.setAttribute('src', ImageLink);

  var details = document.createElement('div');
  details.setAttribute('class', 'details');

  var titleDiv = document.createElement('div');
  var authorDiv = document.createElement('div');
  var idDiv = document.createElement('div');
  idDiv.setAttribute('id', 'bookVol'+i);


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
  var item = document.getElementById('bookVol'+getID).innerText;

}
