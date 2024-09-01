let preveiwContainer = document.querySelector('.products-preview');
let previewBox = preveiwContainer.querySelectorAll('.preview');
let headerStatus = document.querySelector('#header');

document.querySelectorAll('.pro-container .pro').forEach(product =>{

  product.onclick = () => {

    preveiwContainer.style.display = 'flex';
    headerStatus.style.display = 'none'
    let name = product.getAttribute('data-name');

    previewBox.forEach(preview =>{

      let target = preview.getAttribute('data-target');

      if(name == target){
        preview.classList.add('active');
      }
    });

  };
});

previewBox.forEach(close =>{

  close.querySelector('.fa-times').onclick = () =>{
    
    close.classList.remove('active');
    preveiwContainer.style.display = 'none';
    headerStatus.style.display = 'flex'
  };
});