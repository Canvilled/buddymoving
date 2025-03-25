import MainClass, { MAIN_CLASS_PARAMS } from "@scripts/utils/mainClass";

class Video extends MainClass {

  protected video: HTMLVideoElement;
  protected playButton: Element;

  constructor(props: MAIN_CLASS_PARAMS) {
    super(props);
    this.init();
  }

  toggleVideo() {
    if (this.video.paused) {
      this.video.play();
      this.playButton.classList.add('hidden');
    } else {
      this.video.pause();
      this.playButton.classList.remove('hidden');
    }
  }

  init() {
    this.video = this.selector.querySelector('video');
    this.playButton = this.selector.querySelector('.video-item__play-btn');

    this.selector.addEventListener('click', (e) => {
      e.preventDefault();
      this.toggleVideo();
    });

    this.video.addEventListener('ended', () => {
      this.playButton.classList.remove('hidden');
    });
  }
}

export default Video;
