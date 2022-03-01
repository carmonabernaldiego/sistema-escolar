/*-------------------------------------------
  menumobile.js
  By Diego Carmona Bernal - CBDX
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

/*-------------------------------------------
  menu
-------------------------------------------*/

let card = document.getElementById('activator');

let tl = gsap.timeline({
    defaults: {
        ease: 'power2.inOut'
    }
});

let toggle = false;
let toggleU = false;

tl.to('.activator', {
    background: '#6272a4',
    color: '#eef4ff98',
    borderTopRightRadius: '0',
    borderBottomRightRadius: '0'
});

tl.to('.menu-mobile nav', {
    clipPath: 'ellipse(100% 100% at 50% 50%)',
    duration: 0.6
});

tl.to('.menu-mobile nav span', {
    opacity: 1,
    transform: 'translateX(0)',
    stagger: .01,
    duration: 0.3
});

tl.to('.active-menu', {
    opacity: 1,
    transform: 'translateX(0)',
    stagger: .05,
    duration: 0.3
});

tl.pause();

card.addEventListener('click', () => {
    toggle = !toggle;

    if (toggle) {
        tl.play();

        toggleU = !toggleU;

        if (!toggleU) {
            tlU.reverse();
        } else {
            toggleU = !toggleU;
        }
    } else {
        tl.reverse();
    }
});

/*-------------------------------------------
  user
-------------------------------------------*/

let cardU = document.getElementById('activator-user');

let tlU = gsap.timeline({
    defaults: {
        ease: 'power2.inOut'
    }
});

tlU.to('.user-mobile .activator-user', {
    background: '#6272a4',
    border: '3px solid #6272a4',
    borderTopLeftRadius: '0',
    borderBottomLeftRadius: '0'
});

tlU.to('.user-mobile nav', {
    display: 'block',
    width: '100%',
    duration: 0.2
});

tlU.to('.user-mobile nav span', {
    opacity: 1,
    transform: 'translateX(0)',
    stagger: .03,
    duration: 0.3
});

tlU.to('.active-user', {
    opacity: 1,
    transform: 'translateX(0)',
    stagger: .05,
    duration: 0.3
});

tlU.pause();

cardU.addEventListener('click', () => {
    toggleU = !toggleU;

    if (toggleU) {
        tlU.play();

        toggle = !toggle;

        if (!toggle) {
            tl.reverse();
        } else {
            toggle = !toggle;
        }
    } else {
        tlU.reverse();
    }
});