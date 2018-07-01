var favShelf;
var favBooks = new Array();
var id;

//Retrieves books present in user's library
function getAllBooks() {
  var xhttp = new XMLHttpRequest;
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      data = JSON.parse(this.responseText);
      var j = 0;
      while(data.length != 0) {
        var lib = data[j];
        drawToDOM(j, lib);
        if(lib.favourite == 'yes') {
          favBooks.push(lib);
        }
        j++;
      }
    }
  };

  xhttp.open('GET', 'getAllBooks.php', true);
  xhttp.send();
}

//Creates new items container in book shelf
 function drawToDOM(j, lib) {
  var items = document.createElement('div');
  items.setAttribute('class', 'items');
  items.id = j;

  var img = document.createElement('img');
  img.setAttribute('src', lib.ImageLink+'&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api');

  var details = document.createElement('div');
  details.setAttribute('class', 'details');

  var titleDiv = document.createElement('div');
  titleDiv.setAttribute('class', 'credentials');

  var authorDiv = document.createElement('div');
  authorDiv.setAttribute('class', 'credentials');

  var favouritesAdder = document.createElement('div');
  authorDiv.setAttribute('class', 'credentials');

  var liker = document.createElement('div');
  liker.setAttribute('class', 'credentials');


  var readSelect = document.createElement('select');

  var option1 = document.createElement('option');
  option1.innerText = "Want to read";

  var option2 = document.createElement('option');
  option2.innerText = "Curently reading";

  var option3 = document.createElement('option');
  option3.innerText = "Read";

  readSelect.add(option1);
  readSelect.add(option2);
  readSelect.add(option3);



  var idDiv = document.createElement('div');
  idDiv.id = 'bookVol'+j;
  idDiv.style.display = 'none';


  var titleText = document.createTextNode(lib.title);
  var authorText = document.createTextNode(lib.author);
  var idText = document.createTextNode(lib.volumeID);

  var favouritesButton= document.createElement('button');
  if(lib.favourite == 'no') {
    favouritesButton.innerText = "Add to Favourites";
    favouritesButton.setAttribute('onclick', 'addToFav(this);');
  } else {
    favouritesButton.innerText = "Favourite";
    favouritesButton.style.background = 'gray';
  }


  var likerButton = document.createElement('a');
  likerButton.innerHTML = "<i class='fa fa-thumbs-o-up'></i>";
  likerButton.setAttribute('class', 'thumbsUp');
  likerButton.setAttribute('onclick', 'applyLike(this);');


  titleDiv.appendChild(titleText);
  authorDiv.appendChild(authorText);
  idDiv.appendChild(idText);

  favouritesAdder.appendChild(favouritesButton);
  liker.appendChild(likerButton);


  items.appendChild(img);

  details.appendChild(titleDiv);
  details.appendChild(authorDiv);
  details.appendChild(readSelect);
  details.appendChild(favouritesAdder);
  details.appendChild(liker);
  details.appendChild(idDiv);

  items.appendChild(details);
    wrapper.appendChild(items);
}

getAllBooks();


//Acts as head updator for liking, status and favourites
function changer(fav) {
  var item = fav.parentNode.parentNode.parentNode;
  var cover = fav.parentNode.parentNode;
  id = item.id;


  var title = cover.firstChild.innerText;
  return title;
}

//Add to favourites
function addToFav(fav) {
  changeStatus(changer(fav), 'fav');
  fav.innerText = 'Added to Favourites';
  fav.style.background = 'gray';
}

//Add to liked
function applyLike(lik) {
  changeStatus(changer(lik), 'liked');
  lik.firstChild.style.background = 'blue';
}

//function to update status in table
function changeStatus(title, text) {
  var xhttp = new XMLHttpRequest;
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhttp.open('GET', 'changeStatus.php?q='+title+'&p='+text, true);
  xhttp.send();
}

//Draw favourite books when favourites button is clicked
function favLib() {
  while(wrapper.firstChild) {
    wrapper.removeChild(wrapper.firstChild);
  }
  var k = 0;
  while(k < favBooks.length) {
    addToDOM(k, favBooks[k]);
  }
}
