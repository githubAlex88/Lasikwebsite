import Player from '@vimeo/player';

export default class {
  constructor(id, config) {
    this.player = new Player(id, config);
    this.player.setVolume(0);
    this.player.on('play', function() {
      console.log('played the video!', id, config);
    });
  }
  play() {
    this.player.play().setLoop(true).then(() => { console.log('play') })
  }
  stop() {
    this.player.unload()
  }
}