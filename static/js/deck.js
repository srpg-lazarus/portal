document.addEventListener('DOMContentLoaded', function() {

var blankBlock = document.querySelector('#master-unit-list .unit_0').parentNode;
var unitDetailSection = document.querySelector('#unit-detail .unit-detail-status');
var overing = null;

function rewriteBlock(target, newInnerHTML) {
  target.innerHTML = newInnerHTML;
  target.querySelector('.remove').addEventListener('click', handleRemoveClick, false);
}

function handleDragStart(e) {
  this.style.opacity = '0.4';

  dragSrcEl = this;

  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.innerHTML);
}

function handleDragOver(e) {
  e.preventDefault();
  if(this == overing) {
    return false;
  }
  resetCellDesign();
  this.classList.add('over');
  overing = this;
  return false;
}

function handleDrop(e) {
  if(e.stopPropagation) {
    e.stopPropagation();
  }
  if(dragSrcEl != this) {
    if(dragSrcEl.parentNode.id == 'indeck-unit-list') {
      rewriteBlock(dragSrcEl, this.innerHTML);
      rewriteBlock(this, e.dataTransfer.getData('text/html'));
    } else {
      rewriteBlock(this, e.dataTransfer.getData('text/html'));
    }
  }
  return false;
}

function handleDragEnd(e) {
  this.style.opacity = '1';
  resetCellDesign();
}

function resetCellDesign() {
  [].forEach.call(indeckunitList, function(col) {
    col.classList.remove('over');
  });
}

function handleMouseOver(e) {
  this.querySelector('.remove').style.display = '';
}

function showStatusDetail(e) {
  var dataset = this.querySelector('.unit-inner').dataset;
  unitDetailSection.querySelector('.unit-name .name').innerHTML = dataset.name;
  var items = ['name', 'hp', 'power', 'defence', 'cost'];
  items.forEach(function(item) {
    unitDetailSection.querySelector('.'+item).innerHTML = dataset[item];
  });
}

function handleMouseOut(e) {
  this.querySelector('.remove').style.display = 'none';
}

function handleRemoveClick(e) {
  var li = this.parentNode.parentNode;
  rewriteBlock(li, blankBlock.innerHTML);
}

var indeckunitList = document.querySelectorAll('#indeck-unit-list .unit');
[].forEach.call(indeckunitList, function(col) {
  col.addEventListener('dragstart', handleDragStart, false);
  col.addEventListener('dragover', handleDragOver, false);
  col.addEventListener('drop', handleDrop, false);
  col.addEventListener('dragend', handleDragEnd, false);
  col.addEventListener('mouseover', handleMouseOver, false);
  col.addEventListener('mouseover', showStatusDetail, false);
  col.addEventListener('mouseout', handleMouseOut, false);
  col.querySelector('.remove').addEventListener('click', handleRemoveClick, false);
});

var masterunitList = document.querySelectorAll('#master-unit-list .unit');
[].forEach.call(masterunitList, function(col) {
  col.addEventListener('dragstart', handleDragStart, false);
  col.addEventListener('dragend', handleDragEnd, false);
  col.addEventListener('mouseover', showStatusDetail, false);
  col.querySelector('.remove').addEventListener('click', handleRemoveClick, false);
});

});
