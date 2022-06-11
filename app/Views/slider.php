<!DOCTYPE html>
<head>
    <style>
        body {
            color: #0066ff;
            font-family: Helvetica;
        }

        .pagename {
            text-align: center;
            padding: 40px 0;
            font-size: 24px;
            font-weight: bold;
        }

        .sliderImage {
            width: 100%;
        }

        #slideButtonBlock {
            text-align: center;
            width: 100%;
        }

        #slideButtonBlock input[type=button] {
            border: #268bd2 1px solid;
            width: 45%;
            padding: 10px;
            font-size: 18px;
            background-color: #268bd2;
            color: #fff;
            margin: 0 2%;
        }
    </style>
</head>
<body>
<div class="pagename">SLIDER</div>
<div id="slider">

</div>
</body>
<script>
    var Slider = {
        images: [],
        currentImage: 0,
        imgHeight:0,
        setImages: function (images = []) {
            Slider.images = images;
            return Slider;
        },
        init: function () {
            Slider.appendBlocks();
            Slider.appendImg(Slider.currentImage, false, true);
            document.getElementById('sliderImageId' + Slider.currentImage).onload = function() {
                Slider.imgHeight = document.getElementById('sliderImageId' + Slider.currentImage).offsetHeight;
            };
            Slider.carousel();
        },
        appendBlocks: function () {
            var newImageBlock = document.createElement('div');
            newImageBlock.id = 'sliderImageBlock';
            document.getElementById('slider').append(newImageBlock);
            var newButtonsBlock = document.createElement('div');
            newButtonsBlock.id = 'slideButtonBlock';
            document.getElementById('slider').append(newButtonsBlock);
            var newPrevButton = document.createElement('input');
            newPrevButton.type = 'button';
            newPrevButton.value = 'PREV';
            newPrevButton.id = 'prevButtonId';
            newPrevButton.addEventListener('click', function () {
                Slider.prev();
            });
            document.getElementById('slideButtonBlock').append(newPrevButton);
            var newPrevButton = document.createElement('input');
            newPrevButton.type = 'button';
            newPrevButton.value = 'NEXT';
            newPrevButton.id = 'nextButtonId';
            newPrevButton.addEventListener('click', function () {
                Slider.next();
            });
            document.getElementById('slideButtonBlock').append(newPrevButton);
        },
        appendImg: function (key, hidden, append) {
            var newImg = document.createElement('img');
            newImg.src = Slider.images[key];
            if (hidden) {
                newImg.style.display = 'none';
            }
            newImg.id = 'sliderImageId' + key;
            newImg.className = 'sliderImage';
            if (append) {
                document.getElementById('sliderImageBlock').append(newImg);
            } else {
                document.getElementById('sliderImageBlock').prepend(newImg);
            }
        },
        prev: function () {
            if (Slider.currentImage == 0) {
                nextImage = Slider.images.length - 1;
            } else {
                nextImage = Slider.currentImage - 1;
            }
            Slider.appendImg(nextImage, true, false);
            for (i = 0; i <= 100; i = i + 5) {
                timerId = setTimeout(Slider.effect, i * 10, Slider.currentImage, nextImage, i);
            }
            Slider.currentImage = nextImage;
        },
        next: function () {
            if (Slider.currentImage == Slider.images.length - 1) {
                nextImage = 0;
            } else {
                nextImage = Slider.currentImage + 1;
            }
            Slider.appendImg(nextImage, true, true);

            for (i = 0; i <= 100; i = i + 5) {
                timerId = setTimeout(Slider.effect, i * 10, Slider.currentImage, nextImage, i);
            }
            Slider.currentImage = nextImage;
        },
        effect: function (currentImageKey, nextImageKey, percent) {
            oldImagePercent = (100 - percent) / 100;
            oldImageHeight = oldImagePercent * Slider.imgHeight;
            document.getElementById('sliderImageId' + currentImageKey).style.height = oldImageHeight + 'px';
            document.getElementById('sliderImageId' + currentImageKey).style.opacity = oldImagePercent;
            if (oldImageHeight < 10) {
                document.getElementById('sliderImageId' + currentImageKey).remove();
            }

            newImagePercent = 1 - oldImagePercent;
            newImageHeight = Slider.imgHeight - oldImageHeight;
            document.getElementById('sliderImageId' + nextImageKey).style.display = 'block';
            document.getElementById('sliderImageId' + nextImageKey).style.height = newImageHeight + 'px';
            document.getElementById('sliderImageId' + nextImageKey).style.opacity = newImagePercent;
        },
        carousel: function() {
            setInterval(Slider.next, 5000);
        }
    };

    window.onload = function () {
        Slider.setImages([
            'assets/image/1.png',
            'assets/image/2.png',
            'assets/image/3.png',
            'assets/image/4.png',
            'assets/image/5.png'
        ]).init();
    };
</script>
</html>