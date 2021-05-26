let card = document.getElementById('activator');

let tl = gsap.timeline({
    defaults: {
        ease: 'power2.inOut'
    }
})

let toggle = false;

tl.to('.activator', {
    color: '#eef4ff98',
}, '-=.3');

tl.to('.activator', {
    background: '#6272a4',
    color: '#eef4ff98',
    'borderRadius': '0.25em 0 0 0.25em'
});

tl.to('.menu-mobile nav', {
    'clipPath': 'ellipse(100% 100% at 50% 50%)'
}, '-=.5');

tl.to('.menu-mobile nav span', {
    opacity: 1,
    transform: 'translateX(0)',
    stagger: .05
}, '-=.5');

tl.pause();

card.addEventListener('click', () => {
    toggle = !toggle;
    if (toggle ? tl.play() : tl.reverse());
})

let cardU = document.getElementById('activator-user');

let tlU = gsap.timeline({
    defaults: {
        ease: 'power2.inOut'
    }
})

let toggleU = false;

tlU.to('.user-mobile .activator-user', {
    borderRadius: '0 5em 5em 0',
    background: '#6272a4',
    transition: 'all 100ms ease-in'
});

tlU.to('.user-mobile nav', {
    clipPath: 'ellipse(100% 100% at 100% 50%)',
    duration: 0.3
});

tlU.to('.user-mobile nav span', {
    opacity: 1,
    transform: 'translateX(0)',
    stagger: .05,
}, '-=.5')

tlU.pause();

cardU.addEventListener('click', () => {
    toggleU = !toggleU;
    if (toggleU ? tlU.play() : tlU.reverse());
})