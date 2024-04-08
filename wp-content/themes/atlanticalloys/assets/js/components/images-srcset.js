window.addEventListener('load', function () {
  /*
      For all images that has srcset attribute,
      set width and height for improving performance of page rendering
  */
  const images = document.querySelectorAll('img[srcset]')

  images.forEach(function (element) {
    const offsetWidth = element.offsetWidth
    const offsetHeight = element.offsetHeight

    element.setAttribute('width', offsetWidth)
    element.setAttribute('height', offsetHeight)
  })
})
