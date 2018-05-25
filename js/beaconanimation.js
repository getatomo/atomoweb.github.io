var point;
AFRAME.registerComponent('cursor-listener', {
	init: function () {
		this.el.addEventListener('mouseenter', function (evt) {
        //this.setAttribute('color','#ff0000');
        //this.setAttribute('material','opacity:.85');
          //point = getNewPos(evt);
      });
		this.el.addEventListener('mouseleave', function (evt) {
        //this.setAttribute('color','rgb(' + getRandom() + ", " + (getRandom() + 150) + ", " +  (getRandom() + 60)+")");
        //this.setAttribute('material','opacity:1');
    });
	}
})
function animate() {
	element = document.querySelector("#building");
	movement = document.createElement("a-animation");
	movement.setAttribute("attribute", "position");
	movement.setAttribute("from", "200 0 -400");
	movement.setAttribute("to", "0 0 0");
	movement.setAttribute("dur", "10000");
	element.appendChild(movement);
	element.setAttribute("visible", true);
}

function createBeacon(point) {
	
}

function setInvisible() {
	element = document.querySelector("#building");
	element.setAttribute("visible",false);
}
window.onLoad = function(e) {
	setInvisible();
	setTimeout(animate, 3000);
}