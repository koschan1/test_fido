<?php
// FROM HASH: e867b22b7ad862c150a8a5d6a9223aee
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.video-js.vjs-audio .vjs-big-play-button,
.video-js.vjs-audio .vjs-loading-spinner
{
	display: none;
}
.video-js.vjs-audio .vjs-control-bar
{
	display: -webkit-box;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
}

/* Make player height minimum to the controls height so when we hide video/poster area the controls are displayed correctly. */
.video-js.vjs-audio
{
	min-height: 3em;
}

/* Workaround for issue in Firefox and IE where the video has no height */
.video-js.vjs-fluid,
.video-js.vjs-16-9,
.video-js.vjs-4-3 {
  width: 100%;
  max-width: 100%;
  height: 100% !important;
}

/* ';
	$__vars['fontPath'] = 'styles/fonts/videojs';
	$__finalCompiled .= ' */

.video-js .vjs-big-play-button .vjs-icon-placeholder:before, .vjs-button > .vjs-icon-placeholder:before, .video-js .vjs-modal-dialog, .vjs-modal-dialog .vjs-modal-dialog-content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%; }

.video-js .vjs-big-play-button .vjs-icon-placeholder:before, .vjs-button > .vjs-icon-placeholder:before {
  text-align: center; }

@font-face {
  font-family: VideoJS;
  src: url("' . $__templater->escape($__vars['fontPath']) . '/VideoJS.eot?#iefix") format("eot"); }

@font-face {
  font-family: VideoJS;
  src: url(data:application/font-woff;charset=utf-8;base64,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) format("woff"), url(data:application/x-font-ttf;charset=utf-8;base64,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FjY3PgE3LgEnIwYfAR4BFw4BBTM/ARUzESMGAyUVJwMchM2UWwgNq4JHrQgBAapUaAoJcWMBfiIhDiMrAQJLMB0BBAokNAIBPmMiIQ4iLAECSzAeAQUKJDQBP2MiIQ4iLAECSzAeAQUKJDQBAT75g+5B4arNLNIBJ44ByQL9BQ9mvYCKwA8FBQMDwwJVTGdzBf6VB8IHNR08lld9uT4LCRA/qGNxvUwHNR08lld9uT4LCRA/qGNxvUwHNR08lld9uT4LCRA/qGNxvVJkAWUDDEf+tYP5AQAAAAEAAAAABiAGtgAbAAABBAADER4BFzMRITU2ADcWABcVIREzPgE3EQIAA4D+4v6FBwJ/X+D+1QYBJ97eAScG/tXgX38CB/6FBrUH/oX+4v32X38CAlWV3gEnBgb+2d6V/asCf18CCgEeAXsAAAAAEADGAAEAAAAAAAEABwAAAAEAAAAAAAIABwAHAAEAAAAAAAMABwAOAAEAAAAAAAQABwAVAAEAAAAAAAUACwAcAAEAAAAAAAYABwAnAAEAAAAAAAoAKwAuAAEAAAAAAAsAEwBZAAMAAQQJAAEADgBsAAMAAQQJAAIADgB6AAMAAQQJAAMADgCIAAMAAQQJAAQADgCWAAMAAQQJAAUAFgCkAAMAAQQJAAYADgC6AAMAAQQJAAoAVgDIAAMAAQQJAAsAJgEeVmlkZW9KU1JlZ3VsYXJWaWRlb0pTVmlkZW9KU1ZlcnNpb24gMS4wVmlkZW9KU0dlbmVyYXRlZCBieSBzdmcydHRmIGZyb20gRm9udGVsbG8gcHJvamVjdC5odHRwOi8vZm9udGVsbG8uY29tAFYAaQBkAGUAbwBKAFMAUgBlAGcAdQBsAGEAcgBWAGkAZABlAG8ASgBTAFYAaQBkAGUAbwBKAFMAVgBlAHIAcwBpAG8AbgAgADEALgAwAFYAaQBkAGUAbwBKAFMARwBlAG4AZQByAGEAdABlAGQAIABiAHkAIABzAHYAZwAyAHQAdABmACAAZgByAG8AbQAgAEYAbwBuAHQAZQBsAGwAbwAgAHAAcgBvAGoAZQBjAHQALgBoAHQAdABwADoALwAvAGYAbwBuAHQAZQBsAGwAbwAuAGMAbwBtAAAAAgAAAAAAAAARAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAfAAABAgEDAQQBBQEGAQcBCAEJAQoBCwEMAQ0BDgEPARABEQESARMBFAEVARYBFwEYARkBGgEbARwBHQEeAR8EcGxheQtwbGF5LWNpcmNsZQVwYXVzZQt2b2x1bWUtbXV0ZQp2b2x1bWUtbG93CnZvbHVtZS1taWQLdm9sdW1lLWhpZ2gQZnVsbHNjcmVlbi1lbnRlcg9mdWxsc2NyZWVuLWV4aXQGc3F1YXJlB3NwaW5uZXIJc3VidGl0bGVzCGNhcHRpb25zCGNoYXB0ZXJzBXNoYXJlA2NvZwZjaXJjbGUOY2lyY2xlLW91dGxpbmUTY2lyY2xlLWlubmVyLWNpcmNsZQJoZAZjYW5jZWwGcmVwbGF5CGZhY2Vib29rBWdwbHVzCGxpbmtlZGluB3R3aXR0ZXIGdHVtYmxyCXBpbnRlcmVzdBFhdWRpby1kZXNjcmlwdGlvbgVhdWRpbwAAAAAA) format("truetype");
  font-weight: normal;
  font-style: normal; }

.vjs-icon-play, .video-js .vjs-big-play-button .vjs-icon-placeholder:before, .video-js .vjs-play-control .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-play:before, .video-js .vjs-big-play-button .vjs-icon-placeholder:before, .video-js .vjs-play-control .vjs-icon-placeholder:before {
    content: "\\f101"; }

.vjs-icon-play-circle {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-play-circle:before {
    content: "\\f102"; }

.vjs-icon-pause, .video-js .vjs-play-control.vjs-playing .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-pause:before, .video-js .vjs-play-control.vjs-playing .vjs-icon-placeholder:before {
    content: "\\f103"; }

.vjs-icon-volume-mute, .video-js .vjs-mute-control.vjs-vol-0 .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-volume-mute:before, .video-js .vjs-mute-control.vjs-vol-0 .vjs-icon-placeholder:before {
    content: "\\f104"; }

.vjs-icon-volume-low, .video-js .vjs-mute-control.vjs-vol-1 .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-volume-low:before, .video-js .vjs-mute-control.vjs-vol-1 .vjs-icon-placeholder:before {
    content: "\\f105"; }

.vjs-icon-volume-mid, .video-js .vjs-mute-control.vjs-vol-2 .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-volume-mid:before, .video-js .vjs-mute-control.vjs-vol-2 .vjs-icon-placeholder:before {
    content: "\\f106"; }

.vjs-icon-volume-high, .video-js .vjs-mute-control .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-volume-high:before, .video-js .vjs-mute-control .vjs-icon-placeholder:before {
    content: "\\f107"; }

.vjs-icon-fullscreen-enter, .video-js .vjs-fullscreen-control .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-fullscreen-enter:before, .video-js .vjs-fullscreen-control .vjs-icon-placeholder:before {
    content: "\\f108"; }

.vjs-icon-fullscreen-exit, .video-js.vjs-fullscreen .vjs-fullscreen-control .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-fullscreen-exit:before, .video-js.vjs-fullscreen .vjs-fullscreen-control .vjs-icon-placeholder:before {
    content: "\\f109"; }

.vjs-icon-square {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-square:before {
    content: "\\f10a"; }

.vjs-icon-spinner {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-spinner:before {
    content: "\\f10b"; }

.vjs-icon-subtitles, .video-js .vjs-subtitles-button .vjs-icon-placeholder, .video-js .vjs-subs-caps-button .vjs-icon-placeholder,
.video-js.video-js:lang(en-GB) .vjs-subs-caps-button .vjs-icon-placeholder,
.video-js.video-js:lang(en-IE) .vjs-subs-caps-button .vjs-icon-placeholder,
.video-js.video-js:lang(en-AU) .vjs-subs-caps-button .vjs-icon-placeholder,
.video-js.video-js:lang(en-NZ) .vjs-subs-caps-button .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-subtitles:before, .video-js .vjs-subtitles-button .vjs-icon-placeholder:before, .video-js .vjs-subs-caps-button .vjs-icon-placeholder:before,
  .video-js.video-js:lang(en-GB) .vjs-subs-caps-button .vjs-icon-placeholder:before,
  .video-js.video-js:lang(en-IE) .vjs-subs-caps-button .vjs-icon-placeholder:before,
  .video-js.video-js:lang(en-AU) .vjs-subs-caps-button .vjs-icon-placeholder:before,
  .video-js.video-js:lang(en-NZ) .vjs-subs-caps-button .vjs-icon-placeholder:before {
    content: "\\f10c"; }

.vjs-icon-captions, .video-js .vjs-captions-button .vjs-icon-placeholder, .video-js:lang(en) .vjs-subs-caps-button .vjs-icon-placeholder,
.video-js:lang(fr-CA) .vjs-subs-caps-button .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-captions:before, .video-js .vjs-captions-button .vjs-icon-placeholder:before, .video-js:lang(en) .vjs-subs-caps-button .vjs-icon-placeholder:before,
  .video-js:lang(fr-CA) .vjs-subs-caps-button .vjs-icon-placeholder:before {
    content: "\\f10d"; }

.vjs-icon-chapters, .video-js .vjs-chapters-button .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-chapters:before, .video-js .vjs-chapters-button .vjs-icon-placeholder:before {
    content: "\\f10e"; }

.vjs-icon-share {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-share:before {
    content: "\\f10f"; }

.vjs-icon-cog {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-cog:before {
    content: "\\f110"; }

.vjs-icon-circle, .video-js .vjs-play-progress, .video-js .vjs-volume-level {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-circle:before, .video-js .vjs-play-progress:before, .video-js .vjs-volume-level:before {
    content: "\\f111"; }

.vjs-icon-circle-outline {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-circle-outline:before {
    content: "\\f112"; }

.vjs-icon-circle-inner-circle {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-circle-inner-circle:before {
    content: "\\f113"; }

.vjs-icon-hd {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-hd:before {
    content: "\\f114"; }

.vjs-icon-cancel, .video-js .vjs-control.vjs-close-button .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-cancel:before, .video-js .vjs-control.vjs-close-button .vjs-icon-placeholder:before {
    content: "\\f115"; }

.vjs-icon-replay, .video-js .vjs-play-control.vjs-ended .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-replay:before, .video-js .vjs-play-control.vjs-ended .vjs-icon-placeholder:before {
    content: "\\f116"; }

.vjs-icon-facebook {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-facebook:before {
    content: "\\f117"; }

.vjs-icon-gplus {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-gplus:before {
    content: "\\f118"; }

.vjs-icon-linkedin {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-linkedin:before {
    content: "\\f119"; }

.vjs-icon-twitter {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-twitter:before {
    content: "\\f11a"; }

.vjs-icon-tumblr {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-tumblr:before {
    content: "\\f11b"; }

.vjs-icon-pinterest {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-pinterest:before {
    content: "\\f11c"; }

.vjs-icon-audio-description, .video-js .vjs-descriptions-button .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-audio-description:before, .video-js .vjs-descriptions-button .vjs-icon-placeholder:before {
    content: "\\f11d"; }

.vjs-icon-audio, .video-js .vjs-audio-button .vjs-icon-placeholder {
  font-family: VideoJS;
  font-weight: normal;
  font-style: normal; }
  .vjs-icon-audio:before, .video-js .vjs-audio-button .vjs-icon-placeholder:before {
    content: "\\f11e"; }

.video-js {
  display: block;
  vertical-align: top;
  box-sizing: border-box;
  color: #fff;
  background-color: #000;
  position: relative;
  padding: 0;
  font-size: 10px;
  line-height: 1;
  font-weight: normal;
  font-style: normal;
  font-family: Arial, Helvetica, sans-serif; }
  .video-js:-moz-full-screen {
    position: absolute; }
  .video-js:-webkit-full-screen {
    width: 100% !important;
    height: 100% !important; }

.video-js[tabindex="-1"] {
  outline: none; }

.video-js *,
.video-js *:before,
.video-js *:after {
  box-sizing: inherit; }

.video-js ul {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
  list-style-position: outside;
  margin-left: 0;
  margin-right: 0;
  margin-top: 0;
  margin-bottom: 0; }

.video-js.vjs-fluid,
.video-js.vjs-16-9,
.video-js.vjs-4-3 {
  width: 100%;
  max-width: 100%;
  height: 0; }

.video-js.vjs-16-9 {
  padding-top: 56.25%; }

.video-js.vjs-4-3 {
  padding-top: 75%; }

.video-js.vjs-fill {
  width: 100%;
  height: 100%; }

.video-js .vjs-tech {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%; }

body.vjs-full-window {
  padding: 0;
  margin: 0;
  height: 100%;
  overflow-y: auto; }

.vjs-full-window .video-js.vjs-fullscreen {
  position: fixed;
  overflow: hidden;
  z-index: 1000;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0; }

.video-js.vjs-fullscreen {
  width: 100% !important;
  height: 100% !important;
  padding-top: 0 !important; }

.video-js.vjs-fullscreen.vjs-user-inactive {
  cursor: none; }

.vjs-hidden {
  display: none !important; }

.vjs-disabled {
  opacity: 0.5;
  cursor: default; }

.video-js .vjs-offscreen {
  height: 1px;
  left: -9999px;
  position: absolute;
  top: 0;
  width: 1px; }

.vjs-lock-showing {
  display: block !important;
  opacity: 1;
  visibility: visible; }

.vjs-no-js {
  padding: 20px;
  color: #fff;
  background-color: #000;
  font-size: 18px;
  font-family: Arial, Helvetica, sans-serif;
  text-align: center;
  width: 300px;
  height: 150px;
  margin: 0px auto; }

.vjs-no-js a,
.vjs-no-js a:visited {
  color: #66A8CC; }

.video-js .vjs-big-play-button {
  font-size: 3em;
  line-height: 1.5em;
  height: 1.5em;
  width: 3em;
  display: block;
  position: absolute;
  top: 10px;
  left: 10px;
  padding: 0;
  cursor: pointer;
  opacity: 1;
  border: 0.06666em solid #fff;
  background-color: #2B333F;
  background-color: rgba(43, 51, 63, 0.7);
  -webkit-border-radius: 0.3em;
  -moz-border-radius: 0.3em;
  border-radius: 0.3em;
  -webkit-transition: all 0.4s;
  -moz-transition: all 0.4s;
  -ms-transition: all 0.4s;
  -o-transition: all 0.4s;
  transition: all 0.4s; }

.vjs-big-play-centered .vjs-big-play-button {
  top: 50%;
  left: 50%;
  margin-top: -0.75em;
  margin-left: -1.5em; }

.video-js:hover .vjs-big-play-button,
.video-js .vjs-big-play-button:focus {
  border-color: #fff;
  background-color: #73859f;
  background-color: rgba(115, 133, 159, 0.5);
  -webkit-transition: all 0s;
  -moz-transition: all 0s;
  -ms-transition: all 0s;
  -o-transition: all 0s;
  transition: all 0s; }

.vjs-controls-disabled .vjs-big-play-button,
.vjs-has-started .vjs-big-play-button,
.vjs-using-native-controls .vjs-big-play-button,
.vjs-error .vjs-big-play-button {
  display: none; }

.vjs-has-started.vjs-paused.vjs-show-big-play-button-on-pause .vjs-big-play-button {
  display: block; }

.video-js button {
  background: none;
  border: none;
  color: inherit;
  display: inline-block;
  overflow: visible;
  font-size: inherit;
  line-height: inherit;
  text-transform: none;
  text-decoration: none;
  transition: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none; }

.vjs-control .vjs-button {
  width: 100%;
  height: 100%; }

.video-js .vjs-control.vjs-close-button {
  cursor: pointer;
  height: 3em;
  position: absolute;
  right: 0;
  top: 0.5em;
  z-index: 2; }

.video-js .vjs-modal-dialog {
  background: rgba(0, 0, 0, 0.8);
  background: -webkit-linear-gradient(-90deg, rgba(0, 0, 0, 0.8), rgba(255, 255, 255, 0));
  background: linear-gradient(180deg, rgba(0, 0, 0, 0.8), rgba(255, 255, 255, 0));
  overflow: auto;
  box-sizing: content-box; }

.video-js .vjs-modal-dialog > * {
  box-sizing: border-box; }

.vjs-modal-dialog .vjs-modal-dialog-content {
  font-size: 1.2em;
  line-height: 1.5;
  padding: 20px 24px;
  z-index: 1; }

.vjs-menu-button {
  cursor: pointer; }

.vjs-menu-button.vjs-disabled {
  cursor: default; }

.vjs-workinghover .vjs-menu-button.vjs-disabled:hover .vjs-menu {
  display: none; }

.vjs-menu .vjs-menu-content {
  display: block;
  padding: 0;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  overflow: auto;
  box-sizing: content-box; }

.vjs-menu .vjs-menu-content > * {
  box-sizing: border-box; }

.vjs-scrubbing .vjs-menu-button:hover .vjs-menu {
  display: none; }

.vjs-menu li {
  list-style: none;
  margin: 0;
  padding: 0.2em 0;
  line-height: 1.4em;
  font-size: 1.2em;
  text-align: center;
  text-transform: lowercase; }

.vjs-menu li.vjs-menu-item:focus,
.vjs-menu li.vjs-menu-item:hover {
  background-color: #73859f;
  background-color: rgba(115, 133, 159, 0.5); }

.vjs-menu li.vjs-selected,
.vjs-menu li.vjs-selected:focus,
.vjs-menu li.vjs-selected:hover {
  background-color: #fff;
  color: #2B333F; }

.vjs-menu li.vjs-menu-title {
  text-align: center;
  text-transform: uppercase;
  font-size: 1em;
  line-height: 2em;
  padding: 0;
  margin: 0 0 0.3em 0;
  font-weight: bold;
  cursor: default; }

.vjs-menu-button-popup .vjs-menu {
  display: none;
  position: absolute;
  bottom: 0;
  width: 10em;
  left: -3em;
  height: 0em;
  margin-bottom: 1.5em;
  border-top-color: rgba(43, 51, 63, 0.7); }

.vjs-menu-button-popup .vjs-menu .vjs-menu-content {
  background-color: #2B333F;
  background-color: rgba(43, 51, 63, 0.7);
  position: absolute;
  width: 100%;
  bottom: 1.5em;
  max-height: 15em; }

.vjs-workinghover .vjs-menu-button-popup:hover .vjs-menu,
.vjs-menu-button-popup .vjs-menu.vjs-lock-showing {
  display: block; }

.video-js .vjs-menu-button-inline {
  -webkit-transition: all 0.4s;
  -moz-transition: all 0.4s;
  -ms-transition: all 0.4s;
  -o-transition: all 0.4s;
  transition: all 0.4s;
  overflow: hidden; }

.video-js .vjs-menu-button-inline:before {
  width: 2.222222222em; }

.video-js .vjs-menu-button-inline:hover,
.video-js .vjs-menu-button-inline:focus,
.video-js .vjs-menu-button-inline.vjs-slider-active,
.video-js.vjs-no-flex .vjs-menu-button-inline {
  width: 12em; }

.vjs-menu-button-inline .vjs-menu {
  opacity: 0;
  height: 100%;
  width: auto;
  position: absolute;
  left: 4em;
  top: 0;
  padding: 0;
  margin: 0;
  -webkit-transition: all 0.4s;
  -moz-transition: all 0.4s;
  -ms-transition: all 0.4s;
  -o-transition: all 0.4s;
  transition: all 0.4s; }

.vjs-menu-button-inline:hover .vjs-menu,
.vjs-menu-button-inline:focus .vjs-menu,
.vjs-menu-button-inline.vjs-slider-active .vjs-menu {
  display: block;
  opacity: 1; }

.vjs-no-flex .vjs-menu-button-inline .vjs-menu {
  display: block;
  opacity: 1;
  position: relative;
  width: auto; }

.vjs-no-flex .vjs-menu-button-inline:hover .vjs-menu,
.vjs-no-flex .vjs-menu-button-inline:focus .vjs-menu,
.vjs-no-flex .vjs-menu-button-inline.vjs-slider-active .vjs-menu {
  width: auto; }

.vjs-menu-button-inline .vjs-menu-content {
  width: auto;
  height: 100%;
  margin: 0;
  overflow: hidden; }

.video-js .vjs-control-bar {
  display: none;
  width: 100%;
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 3.0em;
  background-color: #2B333F;
  background-color: rgba(43, 51, 63, 0.7); }

.vjs-has-started .vjs-control-bar {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  visibility: visible;
  opacity: 1;
  -webkit-transition: visibility 0.1s, opacity 0.1s;
  -moz-transition: visibility 0.1s, opacity 0.1s;
  -ms-transition: visibility 0.1s, opacity 0.1s;
  -o-transition: visibility 0.1s, opacity 0.1s;
  transition: visibility 0.1s, opacity 0.1s; }

.vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar {
  visibility: visible;
  opacity: 0;
  -webkit-transition: visibility 1s, opacity 1s;
  -moz-transition: visibility 1s, opacity 1s;
  -ms-transition: visibility 1s, opacity 1s;
  -o-transition: visibility 1s, opacity 1s;
  transition: visibility 1s, opacity 1s; }

.vjs-controls-disabled .vjs-control-bar,
.vjs-using-native-controls .vjs-control-bar,
.vjs-error .vjs-control-bar {
  display: none !important; }

.vjs-audio.vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar {
  opacity: 1;
  visibility: visible; }

.vjs-has-started.vjs-no-flex .vjs-control-bar {
  display: table; }

.video-js .vjs-control {
  position: relative;
  text-align: center;
  margin: 0;
  padding: 0;
  height: 100%;
  width: 4em;
  -webkit-box-flex: none;
  -moz-box-flex: none;
  -webkit-flex: none;
  -ms-flex: none;
  flex: none; }

.vjs-button > .vjs-icon-placeholder:before {
  font-size: 1.8em;
  line-height: 1.67; }

.video-js .vjs-control:focus:before,
.video-js .vjs-control:hover:before,
.video-js .vjs-control:focus {
  text-shadow: 0em 0em 1em white; }

.video-js .vjs-control-text {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px; }

.vjs-no-flex .vjs-control {
  display: table-cell;
  vertical-align: middle; }

.video-js .vjs-custom-control-spacer {
  display: none; }

.video-js .vjs-progress-control {
  cursor: pointer;
  -webkit-box-flex: auto;
  -moz-box-flex: auto;
  -webkit-flex: auto;
  -ms-flex: auto;
  flex: auto;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  min-width: 4em; }

.vjs-live .vjs-progress-control {
  display: none; }

.vjs-no-flex .vjs-progress-control {
  width: auto; }

.video-js .vjs-progress-holder {
  -webkit-box-flex: auto;
  -moz-box-flex: auto;
  -webkit-flex: auto;
  -ms-flex: auto;
  flex: auto;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -ms-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
  height: 0.3em; }

.video-js .vjs-progress-control .vjs-progress-holder {
  margin: 0 10px; }

.video-js .vjs-progress-control:hover .vjs-progress-holder {
  font-size: 1.666666666666666666em; }

.video-js .vjs-progress-holder .vjs-play-progress,
.video-js .vjs-progress-holder .vjs-load-progress,
.video-js .vjs-progress-holder .vjs-load-progress div {
  position: absolute;
  display: block;
  height: 100%;
  margin: 0;
  padding: 0;
  width: 0;
  left: 0;
  top: 0; }

.video-js .vjs-play-progress {
  background-color: #fff; }
  .video-js .vjs-play-progress:before {
    font-size: 0.9em;
    position: absolute;
    right: -0.5em;
    top: -0.333333333333333em;
    z-index: 1; }

.video-js .vjs-load-progress {
  background: #bfc7d3;
  background: rgba(115, 133, 159, 0.5); }

.video-js .vjs-load-progress div {
  background: white;
  background: rgba(115, 133, 159, 0.75); }

.video-js .vjs-time-tooltip {
  background-color: #fff;
  background-color: rgba(255, 255, 255, 0.8);
  -webkit-border-radius: 0.3em;
  -moz-border-radius: 0.3em;
  border-radius: 0.3em;
  color: #000;
  float: right;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 1em;
  padding: 6px 8px 8px 8px;
  pointer-events: none;
  position: relative;
  top: -3.4em;
  visibility: hidden;
  z-index: 1; }

.video-js .vjs-progress-holder:focus .vjs-time-tooltip {
  display: none; }

.video-js .vjs-progress-control:hover .vjs-time-tooltip,
.video-js .vjs-progress-control:hover .vjs-progress-holder:focus .vjs-time-tooltip {
  display: block;
  font-size: 0.6em;
  visibility: visible; }

.video-js .vjs-progress-control .vjs-mouse-display {
  display: none;
  position: absolute;
  width: 1px;
  height: 100%;
  background-color: #000;
  z-index: 1; }

.vjs-no-flex .vjs-progress-control .vjs-mouse-display {
  z-index: 0; }

.video-js .vjs-progress-control:hover .vjs-mouse-display {
  display: block; }

.video-js.vjs-user-inactive .vjs-progress-control .vjs-mouse-display {
  visibility: hidden;
  opacity: 0;
  -webkit-transition: visibility 1s, opacity 1s;
  -moz-transition: visibility 1s, opacity 1s;
  -ms-transition: visibility 1s, opacity 1s;
  -o-transition: visibility 1s, opacity 1s;
  transition: visibility 1s, opacity 1s; }

.video-js.vjs-user-inactive.vjs-no-flex .vjs-progress-control .vjs-mouse-display {
  display: none; }

.vjs-mouse-display .vjs-time-tooltip {
  color: #fff;
  background-color: #000;
  background-color: rgba(0, 0, 0, 0.8); }

.video-js .vjs-slider {
  position: relative;
  cursor: pointer;
  padding: 0;
  margin: 0 0.45em 0 0.45em;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-color: #73859f;
  background-color: rgba(115, 133, 159, 0.5); }

.video-js .vjs-slider:focus {
  text-shadow: 0em 0em 1em white;
  -webkit-box-shadow: 0 0 1em #fff;
  -moz-box-shadow: 0 0 1em #fff;
  box-shadow: 0 0 1em #fff; }

.video-js .vjs-mute-control {
  cursor: pointer;
  -webkit-box-flex: none;
  -moz-box-flex: none;
  -webkit-flex: none;
  -ms-flex: none;
  flex: none;
  padding-left: 2em;
  padding-right: 2em;
  padding-bottom: 3em; }

.video-js .vjs-volume-control {
  cursor: pointer;
  margin-right: 1em;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex; }

.video-js .vjs-volume-control.vjs-volume-horizontal {
  width: 5em; }

.video-js .vjs-volume-panel .vjs-volume-control {
  visibility: visible;
  opacity: 0;
  width: 1px;
  height: 1px;
  margin-left: -1px; }

.vjs-no-flex .vjs-volume-panel .vjs-volume-control.vjs-volume-vertical {
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; }
  .vjs-no-flex .vjs-volume-panel .vjs-volume-control.vjs-volume-vertical .vjs-volume-bar,
  .vjs-no-flex .vjs-volume-panel .vjs-volume-control.vjs-volume-vertical .vjs-volume-level {
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; }

.video-js .vjs-volume-panel {
  -webkit-transition: width 1s;
  -moz-transition: width 1s;
  -ms-transition: width 1s;
  -o-transition: width 1s;
  transition: width 1s; }
  .video-js .vjs-volume-panel:hover .vjs-volume-control,
  .video-js .vjs-volume-panel:active .vjs-volume-control,
  .video-js .vjs-volume-panel:focus .vjs-volume-control,
  .video-js .vjs-volume-panel .vjs-volume-control:hover,
  .video-js .vjs-volume-panel .vjs-volume-control:active,
  .video-js .vjs-volume-panel .vjs-volume-control:focus,
  .video-js .vjs-volume-panel .vjs-mute-control:hover ~ .vjs-volume-control,
  .video-js .vjs-volume-panel .vjs-mute-control:active ~ .vjs-volume-control,
  .video-js .vjs-volume-panel .vjs-mute-control:focus ~ .vjs-volume-control,
  .video-js .vjs-volume-panel .vjs-volume-control.vjs-slider-active {
    visibility: visible;
    opacity: 1;
    position: relative;
    -webkit-transition: visibility 0.1s, opacity 0.1s, height 0.1s, width 0.1s, left 0s, top 0s;
    -moz-transition: visibility 0.1s, opacity 0.1s, height 0.1s, width 0.1s, left 0s, top 0s;
    -ms-transition: visibility 0.1s, opacity 0.1s, height 0.1s, width 0.1s, left 0s, top 0s;
    -o-transition: visibility 0.1s, opacity 0.1s, height 0.1s, width 0.1s, left 0s, top 0s;
    transition: visibility 0.1s, opacity 0.1s, height 0.1s, width 0.1s, left 0s, top 0s; }
    .video-js .vjs-volume-panel:hover .vjs-volume-control.vjs-volume-horizontal,
    .video-js .vjs-volume-panel:active .vjs-volume-control.vjs-volume-horizontal,
    .video-js .vjs-volume-panel:focus .vjs-volume-control.vjs-volume-horizontal,
    .video-js .vjs-volume-panel .vjs-volume-control:hover.vjs-volume-horizontal,
    .video-js .vjs-volume-panel .vjs-volume-control:active.vjs-volume-horizontal,
    .video-js .vjs-volume-panel .vjs-volume-control:focus.vjs-volume-horizontal,
    .video-js .vjs-volume-panel .vjs-mute-control:hover ~ .vjs-volume-control.vjs-volume-horizontal,
    .video-js .vjs-volume-panel .vjs-mute-control:active ~ .vjs-volume-control.vjs-volume-horizontal,
    .video-js .vjs-volume-panel .vjs-mute-control:focus ~ .vjs-volume-control.vjs-volume-horizontal,
    .video-js .vjs-volume-panel .vjs-volume-control.vjs-slider-active.vjs-volume-horizontal {
      width: 5em;
      height: 3em; }
    .video-js .vjs-volume-panel:hover .vjs-volume-control.vjs-volume-vertical,
    .video-js .vjs-volume-panel:active .vjs-volume-control.vjs-volume-vertical,
    .video-js .vjs-volume-panel:focus .vjs-volume-control.vjs-volume-vertical,
    .video-js .vjs-volume-panel .vjs-volume-control:hover.vjs-volume-vertical,
    .video-js .vjs-volume-panel .vjs-volume-control:active.vjs-volume-vertical,
    .video-js .vjs-volume-panel .vjs-volume-control:focus.vjs-volume-vertical,
    .video-js .vjs-volume-panel .vjs-mute-control:hover ~ .vjs-volume-control.vjs-volume-vertical,
    .video-js .vjs-volume-panel .vjs-mute-control:active ~ .vjs-volume-control.vjs-volume-vertical,
    .video-js .vjs-volume-panel .vjs-mute-control:focus ~ .vjs-volume-control.vjs-volume-vertical,
    .video-js .vjs-volume-panel .vjs-volume-control.vjs-slider-active.vjs-volume-vertical {
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; }
      .video-js .vjs-volume-panel:hover .vjs-volume-control.vjs-volume-vertical .vjs-volume-bar,
      .video-js .vjs-volume-panel:hover .vjs-volume-control.vjs-volume-vertical .vjs-volume-level,
      .video-js .vjs-volume-panel:active .vjs-volume-control.vjs-volume-vertical .vjs-volume-bar,
      .video-js .vjs-volume-panel:active .vjs-volume-control.vjs-volume-vertical .vjs-volume-level,
      .video-js .vjs-volume-panel:focus .vjs-volume-control.vjs-volume-vertical .vjs-volume-bar,
      .video-js .vjs-volume-panel:focus .vjs-volume-control.vjs-volume-vertical .vjs-volume-level,
      .video-js .vjs-volume-panel .vjs-volume-control:hover.vjs-volume-vertical .vjs-volume-bar,
      .video-js .vjs-volume-panel .vjs-volume-control:hover.vjs-volume-vertical .vjs-volume-level,
      .video-js .vjs-volume-panel .vjs-volume-control:active.vjs-volume-vertical .vjs-volume-bar,
      .video-js .vjs-volume-panel .vjs-volume-control:active.vjs-volume-vertical .vjs-volume-level,
      .video-js .vjs-volume-panel .vjs-volume-control:focus.vjs-volume-vertical .vjs-volume-bar,
      .video-js .vjs-volume-panel .vjs-volume-control:focus.vjs-volume-vertical .vjs-volume-level,
      .video-js .vjs-volume-panel .vjs-mute-control:hover ~ .vjs-volume-control.vjs-volume-vertical .vjs-volume-bar,
      .video-js .vjs-volume-panel .vjs-mute-control:hover ~ .vjs-volume-control.vjs-volume-vertical .vjs-volume-level,
      .video-js .vjs-volume-panel .vjs-mute-control:active ~ .vjs-volume-control.vjs-volume-vertical .vjs-volume-bar,
      .video-js .vjs-volume-panel .vjs-mute-control:active ~ .vjs-volume-control.vjs-volume-vertical .vjs-volume-level,
      .video-js .vjs-volume-panel .vjs-mute-control:focus ~ .vjs-volume-control.vjs-volume-vertical .vjs-volume-bar,
      .video-js .vjs-volume-panel .vjs-mute-control:focus ~ .vjs-volume-control.vjs-volume-vertical .vjs-volume-level,
      .video-js .vjs-volume-panel .vjs-volume-control.vjs-slider-active.vjs-volume-vertical .vjs-volume-bar,
      .video-js .vjs-volume-panel .vjs-volume-control.vjs-slider-active.vjs-volume-vertical .vjs-volume-level {
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; }
  .video-js .vjs-volume-panel.vjs-volume-panel-horizontal:hover, .video-js .vjs-volume-panel.vjs-volume-panel-horizontal:focus, .video-js .vjs-volume-panel.vjs-volume-panel-horizontal:active, .video-js .vjs-volume-panel.vjs-volume-panel-horizontal.vjs-slider-active {
    width: 9em;
    -webkit-transition: width 0.1s;
    -moz-transition: width 0.1s;
    -ms-transition: width 0.1s;
    -o-transition: width 0.1s;
    transition: width 0.1s; }

.video-js .vjs-volume-panel .vjs-volume-control.vjs-volume-vertical {
  height: 8em;
  width: 3em;
  left: -3.5em;
  -webkit-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s 1s, left 1s 1s, top 1s 1s;
  -moz-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s 1s, left 1s 1s, top 1s 1s;
  -ms-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s 1s, left 1s 1s, top 1s 1s;
  -o-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s 1s, left 1s 1s, top 1s 1s;
  transition: visibility 1s, opacity 1s, height 1s 1s, width 1s 1s, left 1s 1s, top 1s 1s; }

.video-js .vjs-volume-panel .vjs-volume-control.vjs-volume-horizontal {
  -webkit-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s, left 1s 1s, top 1s 1s;
  -moz-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s, left 1s 1s, top 1s 1s;
  -ms-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s, left 1s 1s, top 1s 1s;
  -o-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s, left 1s 1s, top 1s 1s;
  transition: visibility 1s, opacity 1s, height 1s 1s, width 1s, left 1s 1s, top 1s 1s; }

.video-js.vjs-no-flex .vjs-volume-panel .vjs-volume-control.vjs-volume-horizontal {
  width: 5em;
  height: 3em;
  visibility: visible;
  opacity: 1;
  position: relative;
  -webkit-transition: none;
  -moz-transition: none;
  -ms-transition: none;
  -o-transition: none;
  transition: none; }

.video-js.vjs-no-flex .vjs-volume-control.vjs-volume-vertical,
.video-js.vjs-no-flex .vjs-volume-panel .vjs-volume-control.vjs-volume-vertical {
  position: absolute;
  bottom: 3em;
  left: 0.5em; }

.video-js .vjs-volume-panel {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex; }

.video-js .vjs-volume-bar {
  margin: 1.35em 0.45em; }

.vjs-volume-bar.vjs-slider-horizontal {
  width: 5em;
  height: 0.3em; }

.vjs-volume-bar.vjs-slider-vertical {
  width: 0.3em;
  height: 5em;
  margin: 1.35em auto; }

.video-js .vjs-volume-level {
  position: absolute;
  bottom: 0;
  left: 0;
  background-color: #fff; }
  .video-js .vjs-volume-level:before {
    position: absolute;
    font-size: 0.9em; }

.vjs-slider-vertical .vjs-volume-level {
  width: 0.3em; }
  .vjs-slider-vertical .vjs-volume-level:before {
    top: -0.5em;
    left: -0.3em; }

.vjs-slider-horizontal .vjs-volume-level {
  height: 0.3em; }
  .vjs-slider-horizontal .vjs-volume-level:before {
    top: -0.3em;
    right: -0.5em; }

.video-js .vjs-volume-panel.vjs-volume-panel-vertical {
  width: 4em; }

.vjs-volume-bar.vjs-slider-vertical .vjs-volume-level {
  height: 100%; }

.vjs-volume-bar.vjs-slider-horizontal .vjs-volume-level {
  width: 100%; }

.video-js .vjs-volume-vertical {
  width: 3em;
  height: 8em;
  bottom: 8em;
  background-color: #2B333F;
  background-color: rgba(43, 51, 63, 0.7); }

.video-js .vjs-volume-horizontal .vjs-menu {
  left: -2em; }

.vjs-poster {
  display: inline-block;
  vertical-align: middle;
  background-repeat: no-repeat;
  background-position: 50% 50%;
  background-size: contain;
  background-color: #000000;
  cursor: pointer;
  margin: 0;
  padding: 0;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  height: 100%; }

.vjs-poster img {
  display: block;
  vertical-align: middle;
  margin: 0 auto;
  max-height: 100%;
  padding: 0;
  width: 100%; }

.vjs-has-started .vjs-poster {
  display: none; }

.vjs-audio.vjs-has-started .vjs-poster {
  display: block; }

.vjs-using-native-controls .vjs-poster {
  display: none; }

.video-js .vjs-live-control {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: flex-start;
  -webkit-align-items: flex-start;
  -ms-flex-align: flex-start;
  align-items: flex-start;
  -webkit-box-flex: auto;
  -moz-box-flex: auto;
  -webkit-flex: auto;
  -ms-flex: auto;
  flex: auto;
  font-size: 1em;
  line-height: 3em; }

.vjs-no-flex .vjs-live-control {
  display: table-cell;
  width: auto;
  text-align: left; }

.video-js .vjs-time-control {
  -webkit-box-flex: none;
  -moz-box-flex: none;
  -webkit-flex: none;
  -ms-flex: none;
  flex: none;
  font-size: 1em;
  line-height: 3em;
  min-width: 2em;
  width: auto;
  padding-left: 1em;
  padding-right: 1em; }

.vjs-live .vjs-time-control {
  display: none; }

.video-js .vjs-current-time,
.vjs-no-flex .vjs-current-time {
  display: none; }

.vjs-no-flex .vjs-remaining-time.vjs-time-control.vjs-control {
  width: 0px !important;
  white-space: nowrap; }

.video-js .vjs-duration,
.vjs-no-flex .vjs-duration {
  display: none; }

.vjs-time-divider {
  display: none;
  line-height: 3em; }

.vjs-live .vjs-time-divider {
  display: none; }

.video-js .vjs-play-control .vjs-icon-placeholder {
  cursor: pointer;
  -webkit-box-flex: none;
  -moz-box-flex: none;
  -webkit-flex: none;
  -ms-flex: none;
  flex: none; }

.vjs-text-track-display {
  position: absolute;
  bottom: 3em;
  left: 0;
  right: 0;
  top: 0;
  pointer-events: none; }

.video-js.vjs-user-inactive.vjs-playing .vjs-text-track-display {
  bottom: 1em; }

.video-js .vjs-text-track {
  font-size: 1.4em;
  text-align: center;
  margin-bottom: 0.1em;
  background-color: #000;
  background-color: rgba(0, 0, 0, 0.5); }

.vjs-subtitles {
  color: #fff; }

.vjs-captions {
  color: #fc6; }

.vjs-tt-cue {
  display: block; }

video::-webkit-media-text-track-display {
  -moz-transform: translateY(-3em);
  -ms-transform: translateY(-3em);
  -o-transform: translateY(-3em);
  -webkit-transform: translateY(-3em);
  transform: translateY(-3em); }

.video-js.vjs-user-inactive.vjs-playing video::-webkit-media-text-track-display {
  -moz-transform: translateY(-1.5em);
  -ms-transform: translateY(-1.5em);
  -o-transform: translateY(-1.5em);
  -webkit-transform: translateY(-1.5em);
  transform: translateY(-1.5em); }

.video-js .vjs-fullscreen-control {
  cursor: pointer;
  -webkit-box-flex: none;
  -moz-box-flex: none;
  -webkit-flex: none;
  -ms-flex: none;
  flex: none; }

.vjs-playback-rate > .vjs-menu-button,
.vjs-playback-rate .vjs-playback-rate-value {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%; }

.vjs-playback-rate .vjs-playback-rate-value {
  pointer-events: none;
  font-size: 1.5em;
  line-height: 2;
  text-align: center; }

.vjs-playback-rate .vjs-menu {
  width: 4em;
  left: 0em; }

.vjs-error .vjs-error-display .vjs-modal-dialog-content {
  font-size: 1.4em;
  text-align: center; }

.vjs-error .vjs-error-display:before {
  color: #fff;
  content: \'X\';
  font-family: Arial, Helvetica, sans-serif;
  font-size: 4em;
  left: 0;
  line-height: 1;
  margin-top: -0.5em;
  position: absolute;
  text-shadow: 0.05em 0.05em 0.1em #000;
  text-align: center;
  top: 50%;
  vertical-align: middle;
  width: 100%; }

.vjs-loading-spinner {
  display: none;
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -25px 0 0 -25px;
  opacity: 0.85;
  text-align: left;
  border: 6px solid rgba(43, 51, 63, 0.7);
  box-sizing: border-box;
  background-clip: padding-box;
  width: 50px;
  height: 50px;
  border-radius: 25px; }

.vjs-seeking .vjs-loading-spinner,
.vjs-waiting .vjs-loading-spinner {
  display: block; }

.vjs-loading-spinner:before,
.vjs-loading-spinner:after {
  content: "";
  position: absolute;
  margin: -6px;
  box-sizing: inherit;
  width: inherit;
  height: inherit;
  border-radius: inherit;
  opacity: 1;
  border: inherit;
  border-color: transparent;
  border-top-color: white; }

.vjs-seeking .vjs-loading-spinner:before,
.vjs-seeking .vjs-loading-spinner:after,
.vjs-waiting .vjs-loading-spinner:before,
.vjs-waiting .vjs-loading-spinner:after {
  -webkit-animation: vjs-spinner-spin 1.1s cubic-bezier(0.6, 0.2, 0, 0.8) infinite, vjs-spinner-fade 1.1s linear infinite;
  animation: vjs-spinner-spin 1.1s cubic-bezier(0.6, 0.2, 0, 0.8) infinite, vjs-spinner-fade 1.1s linear infinite; }

.vjs-seeking .vjs-loading-spinner:before,
.vjs-waiting .vjs-loading-spinner:before {
  border-top-color: white; }

.vjs-seeking .vjs-loading-spinner:after,
.vjs-waiting .vjs-loading-spinner:after {
  border-top-color: white;
  -webkit-animation-delay: 0.44s;
  animation-delay: 0.44s; }

@keyframes vjs-spinner-spin {
  100% {
    transform: rotate(360deg); } }

@-webkit-keyframes vjs-spinner-spin {
  100% {
    -webkit-transform: rotate(360deg); } }

@keyframes vjs-spinner-fade {
  0% {
    border-top-color: #73859f; }
  20% {
    border-top-color: #73859f; }
  35% {
    border-top-color: white; }
  60% {
    border-top-color: #73859f; }
  100% {
    border-top-color: #73859f; } }

@-webkit-keyframes vjs-spinner-fade {
  0% {
    border-top-color: #73859f; }
  20% {
    border-top-color: #73859f; }
  35% {
    border-top-color: white; }
  60% {
    border-top-color: #73859f; }
  100% {
    border-top-color: #73859f; } }

.vjs-chapters-button .vjs-menu ul {
  width: 24em; }

.video-js .vjs-subs-caps-button + .vjs-menu .vjs-captions-menu-item .vjs-menu-item-text .vjs-icon-placeholder {
  position: absolute; }

.video-js .vjs-subs-caps-button + .vjs-menu .vjs-captions-menu-item .vjs-menu-item-text .vjs-icon-placeholder:before {
  font-family: VideoJS;
  content: "\\f10d";
  font-size: 1.5em;
  line-height: inherit; }

.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-custom-control-spacer {
  -webkit-box-flex: auto;
  -moz-box-flex: auto;
  -webkit-flex: auto;
  -ms-flex: auto;
  flex: auto; }

.video-js.vjs-layout-tiny:not(.vjs-fullscreen).vjs-no-flex .vjs-custom-control-spacer {
  width: auto; }

.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-current-time, .video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-time-divider, .video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-duration, .video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-remaining-time,
.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-playback-rate, .video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-progress-control,
.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-mute-control, .video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-volume-control,
.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-chapters-button, .video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-descriptions-button, .video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-captions-button,
.video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-subtitles-button, .video-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-audio-button {
  display: none; }

.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-current-time, .video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-time-divider, .video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-duration, .video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-remaining-time,
.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-playback-rate,
.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-mute-control, .video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-volume-control,
.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-chapters-button, .video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-descriptions-button, .video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-captions-button,
.video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-subtitles-button, .video-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-audio-button {
  display: none; }

.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-current-time, .video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-time-divider, .video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-duration, .video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-remaining-time,
.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-playback-rate,
.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-mute-control, .video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-volume-control,
.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-chapters-button, .video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-descriptions-button, .video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-captions-button,
.video-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-subtitles-button .vjs-audio-button {
  display: none; }

.vjs-modal-dialog.vjs-text-track-settings {
  background-color: #2B333F;
  background-color: rgba(43, 51, 63, 0.75);
  color: #fff;
  height: 70%; }

.vjs-text-track-settings .vjs-modal-dialog-content {
  display: table; }

.vjs-text-track-settings .vjs-track-settings-colors,
.vjs-text-track-settings .vjs-track-settings-font,
.vjs-text-track-settings .vjs-track-settings-controls {
  display: table-cell; }

.vjs-text-track-settings .vjs-track-settings-controls {
  text-align: right;
  vertical-align: bottom; }

.vjs-text-track-settings fieldset {
  margin: 5px;
  padding: 3px;
  border: none; }

.vjs-text-track-settings fieldset span {
  display: inline-block;
  margin-left: 5px; }

.vjs-text-track-settings legend {
  color: #fff;
  margin: 0 0 5px 0; }

.vjs-text-track-settings .vjs-label {
  position: absolute;
  clip: rect(1px 1px 1px 1px);
  clip: rect(1px, 1px, 1px, 1px);
  display: block;
  margin: 0 0 5px 0;
  padding: 0;
  border: 0;
  height: 1px;
  width: 1px;
  overflow: hidden; }

.vjs-track-settings-controls button:focus,
.vjs-track-settings-controls button:active {
  outline-style: solid;
  outline-width: medium;
  background-image: linear-gradient(0deg, #fff 88%, #73859f 100%); }

.vjs-track-settings-controls button:hover {
  color: rgba(43, 51, 63, 0.75); }

.vjs-track-settings-controls button {
  background-color: #fff;
  background-image: linear-gradient(-180deg, #fff 88%, #73859f 100%);
  color: #2B333F;
  cursor: pointer;
  border-radius: 2px; }

.vjs-track-settings-controls .vjs-default-button {
  margin-right: 1em; }

@media print {
  .video-js > *:not(.vjs-tech):not(.vjs-poster) {
    visibility: hidden; } }

@media \\0screen {
  .vjs-user-inactive.vjs-playing .vjs-control-bar :before {
    content: "";
  }
}

@media \\0screen {
  .vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar {
    visibility: hidden;
  }
}';
	return $__finalCompiled;
}
);