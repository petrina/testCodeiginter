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
            #slideButtonBlock{
                text-align: center;
                width: 100%;
            }
            #slideButtonBlock input[type=button] {
                border: #268bd2 1px solid;
                width:45%;
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
        images : [],
        currentImage : 0,
        setImages: function(images = []) {
            this.images = images;
            return this;
        },
        init: function() {
            this.appendBlocks();
            this.appendImg();
        },
        appendBlocks: function() {
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
            newPrevButton.addEventListener('click', function() { Slider.prev(); });
            document.getElementById('slideButtonBlock').append(newPrevButton);
            var newPrevButton = document.createElement('input');
            newPrevButton.type = 'button';
            newPrevButton.value = 'NEXT';
            newPrevButton.id = 'nextButtonId';
            newPrevButton.addEventListener('click', function() { Slider.next(); });
            document.getElementById('slideButtonBlock').append(newPrevButton);
        },
        appendImg: function() {
            for(key in this.images) {
                var newImg = document.createElement('img');
                newImg.src = this.images[key];
                if (key != 0) {
                    newImg.style.display = 'none';
                }
                newImg.id='sliderImageId' + key;
                newImg.className = 'sliderImage';
                document.getElementById('sliderImageBlock').append(newImg);
            }
        },
        prev: function() {
            if (this.currentImage == 0) {
                nextImage = this.images.length - 1;
            } else {
                nextImage = this.currentImage - 1;
            }
            document.getElementById('sliderImageId' + this.currentImage).style.display = 'none';
            document.getElementById('sliderImageId' + nextImage).style.display = 'block';
            this.currentImage = nextImage;
        },
        next: function() {
            if (this.currentImage == this.images.length - 1) {
                nextImage = 0;
            } else {
                nextImage = this.currentImage + 1;
            }
            document.getElementById('sliderImageId' + this.currentImage).style.display = 'none';
            document.getElementById('sliderImageId' + nextImage).style.display = 'block';
            this.currentImage = nextImage;
        }
    };

    window.onload = function() {
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