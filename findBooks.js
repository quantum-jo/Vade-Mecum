var data;
var title;
var author;
var ImageLink;
var volumeID;

var wrapper = document.getElementById('content');

function findBookData(value) {
  console.log('enters function');


  var xhttp = new XMLHttpRequest;
  xhttp.onreadystatechange = function() {

    if(this.readyState == 4 && this.status == 200) {
      data = JSON.parse(this.responseText);
      console.log(data);

      if(data.totalItems != 0) {
        var count = (data.totalItems > 5) ? 5 : data.totalItems;

        for(var i = 0; i < count; i++) {
          title = data.items[i].volumeInfo.title;
          author = data.items[i].volumeInfo.authors;
          ImageLink = data.items[i].volumeInfo.smallThumbnail;
          volumeID = data.items[i].id;
          addToDOM(i);
        }
      }
    }

  };

  xhttp.open('GET', 'https://www.googleapis.com/books/v1/volumes?q='+value, true);
  xhttp.send();
}

function addToDOM(i) {
  var items = document.createElement('div');
  items.setAttribute('class', 'items');
  items.setAttribute('id', i);

  var imgLoad = document.createElement('div');
  imgLoad.setAttribute('class', 'thumbnail');

  var img = document.createElement('img');
  img.setAttribute('src', ImageLink);

  var details = document.createElement('div');
  details.setAttribute('class', 'details');

  var titleDiv = document.createElement('div');
  var authorDiv = document.createElement('div');
  var idDiv = document.createElement('div');
  idDiv.setAttribute('id', 'bookID'+i);

  var titleText = document.createTextNode(title);
  var authorText = document.createTextNode(author);
  var idText = document.createTextNode(volumeID);

  titleDiv.appendChild(titleText);
  authorDiv.appendChild(authorText);
  idDiv.appendChild(idText);

  imgLoad.appendChild(img);
  items.appendChild(imgLoad);

  details.appendChild(titleDiv);
  details.appendChild(titleDiv);
  details.appendChild(titleDiv);

  items.appendChild(details);

  wrapper.appendChild(items);


}
