var card = document.getElementById('activator');

var tl = gsap.timeline({
    defaults: {
        ease: "power2.inOut"
    }
})

var toggle = false;

tl.to('.activator', {
    background: '#6272a4',
    'borderRadius': '0.6em 0 0 0.6em'
});

tl.to('.menu-mobile nav', {
    'clipPath': 'ellipse(100% 100% at 50% 50%)'
}, "-=.5")

tl.to('.menu-mobile nav img', {
    opacity: 1,
    transform: 'translateX(0)',
    stagger: .05
}, "-=.5")

tl.pause();

card.addEventListener('click', () => {
    toggle = !toggle;
    if (toggle ? tl.play() : tl.reverse());
})

var cardU = document.getElementById('activator-user');

var tlU = gsap.timeline({
    defaults: {
        ease: "power2.inOut"
    }
})

var toggleU = false;

tlU.to('.user-mobile .activator-user', {
    borderRadius: '0 5em 5em 0',
    background: '#6272a4',
    transition: 'all 400ms',
    duration: 0.4
})

tlU.to('.user-mobile nav', {
    clipPath: 'ellipse(100% 100% at 100% 50%)',
    duration: 0.3
})

tlU.to('.user-mobile nav img', {
    opacity: 1,
    transform: 'translateX(0)',
    stagger: .05,
}, "-=.5")

tlU.pause();

cardU.addEventListener('click', () => {
    toggleU = !toggleU;
    if (toggleU ? tlU.play() : tlU.reverse());
})