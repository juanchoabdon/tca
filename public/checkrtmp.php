<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>:D</title>
  </head>
  <body>
    <script type="text/javascript" src="/flowplayer/flowplayer.js"></script>
    <a style="display:block;width:520px;height:330px" id="player"> </a>
    <script>
    flowplayer("player", "http://releases.flowplayer.org/swf/flowplayer-7.0.4.swf",
    {
    clip: {
                provider: 'rtmp'
          },
    playlist: [
                 'mp4:snap.mp4'
              ],
    plugins:
    {
       rtmp: {
              url: "flowplayer.rtmp-3.2.11.swf",
              netConnectionUrl: 'rtmp://tradingclubacademy.com/live/Criptomonedas'
             }
    }
    });
    </script>
  </body>


</html>
