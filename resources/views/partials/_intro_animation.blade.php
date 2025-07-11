<style>
  #intro-screen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: white; /* 背景を白に変更 */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    overflow: hidden; /* 動画がはみ出さないように */
  }

  #banana-video {
    width: 90%; /* 画面幅の90% */
    max-width: 750px; /* 最大幅を750pxに制限 */
    height: auto; /* アスペクト比を維持 */
    display: block;
  }
</style>

<div id="intro-screen">
  <video id="banana-video" src="{{ asset('videos/banana_animation.mp4') }}" autoplay muted playsinline></video>
</div>