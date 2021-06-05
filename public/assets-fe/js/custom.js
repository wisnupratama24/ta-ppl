const content = document.querySelector('.content col-md-6');
const jumbo = document.querySelector('.jumbo');

content.addEventListener('click', function (e) {
  if (e.target.className == 'img-publish') {
    //agar tampilan umpan bisa berubah.
    jumbo.src = e.target.src;
  }
});
