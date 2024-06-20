document.addEventListener('DOMContentLoaded', () => {
    const playPauseIcon = document.getElementById('play-pause');
    const audioPlayer = document.getElementById('audioPlayer');
    const rotatingImage = document.getElementById('rotatingImage');

    playPauseIcon.addEventListener('click', (e) => {
        e.preventDefault();
        setTimeout( ()=>{
            if (audioPlayer.paused) {
                playPauseIcon.textContent = 'pause';
                rotatingImage.style.animationPlayState = 'running';
                audioPlayer.play();
            } else {
                audioPlayer.pause();
                playPauseIcon.textContent = 'play_arrow';
                rotatingImage.style.animationPlayState = 'pause';
            }    
        }
       , 100);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const volumeDiv = document.querySelector('.volume');
    const volumeSliderContainer = document.querySelector('.volume-slider-container');

    volumeDiv.addEventListener('click', () => {
        if (volumeSliderContainer.style.display === 'block') {
            volumeSliderContainer.style.display = 'none';
        } else {
            volumeSliderContainer.style.display = 'block';
        }
    });

    // Đóng menu khi nhấp bên ngoài
    window.addEventListener('click', (event) => {
        if (!volumeDiv.contains(event.target) && !volumeSliderContainer.contains(event.target)) {
            volumeSliderContainer.style.display = 'none';
        }
    });
});

// Thay đổi âm lượng
document.addEventListener('DOMContentLoaded', () => {
    const audioPlayer = document.getElementById('audioPlayer');
    const volumeSlider = document.getElementById('volumeSlider');
    const progressBar = document.getElementById('progressBar');
    const currentTimeSpan = document.getElementById('currentTime');
    const durationSpan = document.getElementById('duration');
    volumeSlider.addEventListener('input', () => {
        audioPlayer.volume = volumeSlider.value / 100; 
    });

    // thời lượng tiến trình
    const formatTime = (time) => {
        const minutes = Math.floor(time / 60);
        const seconds = Math.floor(time % 60);
        return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    };

    audioPlayer.addEventListener('loadedmetadata', () => {
        progressBar.max = audioPlayer.duration;
        durationSpan.textContent = formatTime(audioPlayer.duration);
    });

    audioPlayer.addEventListener('timeupdate', () => {
        progressBar.value = (audioPlayer.currentTime / audioPlayer.duration) * 100;;
        currentTimeSpan.textContent = formatTime(audioPlayer.currentTime);
    });

    progressBar.addEventListener('input', () => {
        const newTime = (progressBar.value / 100) * audioPlayer.duration;
        audioPlayer.currentTime = newTime;
    });
});



document.addEventListener('DOMContentLoaded', () => {
    const icons = document.querySelectorAll('#shuffle');

    icons.forEach(icon => {
        icon.addEventListener('click', () => {
            icon.classList.toggle('toggle_opacity');
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const repeatIcon = document.getElementById('repeat');
    let clickCount = 0;

    repeatIcon.addEventListener('click', () => {
        clickCount++;
        
        if (clickCount % 3 === 1) {
            repeatIcon.textContent = 'repeat';
            repeatIcon.classList.add('toggle_opacity');
        } else if (clickCount % 3 === 2) {
            repeatIcon.textContent = 'repeat_one';
        } else {
            repeatIcon.textContent = 'repeat';
            repeatIcon.classList.remove('toggle_opacity');
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const rotateIcon = document.getElementById('rotate-icon');

    rotateIcon.addEventListener('click', () => {
        rotateIcon.classList.toggle('toggle');
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.playlist-header .tab');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Xóa lớp 'active' từ tất cả các thẻ span
            tabs.forEach(item => item.classList.remove('active'));
            // Thêm lớp 'active' vào thẻ span được nhấp vào
            tab.classList.add('active');
        });
    });
});

/* Chạy dừng đĩa */
// document.addEventListener('DOMContentLoaded', () => {
//     const playPauseButton = document.getElementById('play-pause');
//     const rotatingImage = document.getElementById('rotatingImage');
//     let isRotating = true;

//     playPauseButton.addEventListener('click', () => {
//         if (isRotating) {
//             rotatingImage.style.animationPlayState = 'paused';
//             playPauseButton.textContent = 'play_arrow';
//         } else {
//             rotatingImage.style.animationPlayState = 'running';
//             playPauseButton.textContent = 'pause';
//         }
//         isRotating = !isRotating;
//     });
// });