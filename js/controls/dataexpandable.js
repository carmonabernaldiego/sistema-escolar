/*-------------------------------------------
  dataexpandable.js
  By Diego Carmona Bernal - CBDX
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$('body').on('keydown input', 'textarea[data-expandable]', function() {
    this.style.removeProperty('height');
    this.style.height = (this.scrollHeight + 1) + 'px';
}).on('mousedown focus', 'textarea[data-expandable]', function() {
    this.style.removeProperty('height');
    this.style.height = (this.scrollHeight + 1) + 'px';
});