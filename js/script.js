// --------------profile page-------------- 
function showInformation(){
document.getElementById("myPost-info-div-profile-section").style.display = 'none';
document.getElementById("information-info-div-profile-section").style.display = 'block';
document.getElementById("info-title-info-div-profile-section").style.color = '#FFFFFF';
document.getElementById("post-title-info-div-profile-section").style.color = '#DED9D9';
}

function showPost(){
    document.getElementById("information-info-div-profile-section").style.display = 'none';
    document.getElementById("myPost-info-div-profile-section").style.display = 'block';
    document.getElementById("post-title-info-div-profile-section").style.color = '#FFFFFF';
    document.getElementById("info-title-info-div-profile-section").style.color = '#DED9D9';
    }


// ------------Scroll to top-------------------------- 

function scrollToTop() {
  document.querySelector('#div-discussion').scrollIntoView({ 
    behavior: 'smooth' 
  });
}



// ------------for typewrite effect-------------------------- 
var TxtType = function(el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
};

TxtType.prototype.tick = function() {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];

  if (this.isDeleting) {
  this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
  this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

  var that = this;
  var delta = 200 - Math.random() * 100;

  if (this.isDeleting) { delta /= 2; }

  if (!this.isDeleting && this.txt === fullTxt) {
  delta = this.period;
  this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
  this.isDeleting = false;
  this.loopNum++;
  delta = 500;
  }

  setTimeout(function() {
  that.tick();
  }, delta);
};

window.onload = function() {
  var elements = document.getElementsByClassName('typewrite');
  for (var i=0; i<elements.length; i++) {
      var toRotate = elements[i].getAttribute('data-type');
      var period = elements[i].getAttribute('data-period');
      if (toRotate) {
        new TxtType(elements[i], JSON.parse(toRotate), period);
      }
  }
  // INJECT CSS
  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
  document.body.appendChild(css);
};


// ------------for discussion menu-------------------------- 
var modal = document.getElementById("postDiscussionItem-myModal");
var writebtn = document.getElementById("writeBtn");
var span = document.getElementsByClassName("close-postDiscussionItem-modal")[0];

writebtn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


