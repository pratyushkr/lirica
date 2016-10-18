var player,
    APIModules,
    videoPlayer,
    experienceModule;
		 
function onTemplateLoad(experienceID) {
  player = brightcove.api.getExperience(experienceID);
  APIModules = brightcove.api.modules.APIModules;
}
       
function onTemplateReady(evt) {
  videoPlayer = player.getModule(APIModules.VIDEO_PLAYER);
  experienceModule = player.getModule(APIModules.EXPERIENCE);
	   
  videoPlayer.getCurrentRendition(function(renditionDTO) {		 
    if (renditionDTO) {
        calulateNewPercentage(renditionDTO.frameWidth, renditionDTO.frameHeight);
    } else {
      videoPlayer.addEventListener(brightcove.api.events.MediaEvent.PLAY, function(event) {
        calulateNewPercentage(event.media.renditions[0].frameWidth, event.media.renditions[0].frameHeight);	 
      });
    }
  });
			 
  var evt = document.createEvent('UIEvents');
  evt.initUIEvent('resize',true,false,0);
  window.dispatchEvent(evt);
	 
  videoPlayer.play();
}
		
function calulateNewPercentage(width,height) {
  var newPercentage = ((height / width) * 100) + "%";
  document.getElementById("container1").style.paddingBottom = newPercentage;
}
       
window.onresize = function(evt) {
  var resizeWidth = $(".BrightcoveExperience").width(),
      resizeHeight = $(".BrightcoveExperience").height();
  if (experienceModule && experienceModule.experience.type == "html") {
    experienceModule.setSize(resizeWidth, resizeHeight);
  }
}