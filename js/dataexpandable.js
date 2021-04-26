$('body').on('keydown input', 'textarea[data-expandable]', function() {
    //Auto-expanding textarea
    this.style.removeProperty('height');
    this.style.height = (this.scrollHeight + 1) + 'px';
}).on('mousedown focus', 'textarea[data-expandable]', function() {
    //Do this on focus, to allow textarea to animate to height...
    this.style.removeProperty('height');
    this.style.height = (this.scrollHeight + 1) + 'px';
});