const images = document.querySelectorAll('.img-container img');
const modal = document.querySelector('.modal');
const fullImage = document.querySelector('.full-image');

images.forEach(img => {
  img.addEventListener('click', () => {
    modal.classList.add('open');

    // เปลี่ยน path จาก small -> full
    const imgSrc = img.src.replace('small/', 'full/');
    fullImage.src = imgSrc;
  });
});

// คลิกพื้นหลังเพื่อปิด
modal.addEventListener('click', () => {
  modal.classList.remove('open');
});
