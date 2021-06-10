
	jQuery(document).ready(function($) {

        var drag_items = $('.dnd-image-drag .drag');
        var drop_items = $('.dnd-image-drag').find('.drop');

        //set up drag and drop event listeners
        function setUpEventListeners() {

          drag_items.each(function() {
            var thisDrag = $(this);
            thisDrag[0].addEventListener('dragstart', dragStart);
            thisDrag[0].addEventListener('drag', drag);
            thisDrag[0].addEventListener('dragend', dragEnd);
          });

          drop_items.each(function() {
            var thisDrop = $(this);

            thisDrop[0].addEventListener('dragenter', dragEnter);
            thisDrop[0].addEventListener('dragover', dragOver);
            thisDrop[0].addEventListener('dragleave', dragLeave);
            thisDrop[0].addEventListener('drop', drop);

          });

        }
        setUpEventListeners();

        var dragItem;

        //called as soon as the draggable starts being dragged
        //used to set up data and options
        function dragStart(event) {

          drag = event.target;
          dragItem = event.target;

          //set the effectAllowed for the drag item
          event.dataTransfer.effectAllowed = 'copy';

          var imageSrc = $(dragItem).prop('src');
          var imageHTML = $(dragItem).prop('outerHTML');

          //check for IE (it supports only 'text' or 'URL')
          try {
            event.dataTransfer.setData('text/uri-list', imageSrc);
            event.dataTransfer.setData('text/html', imageHTML);
          } catch (e) {
            event.dataTransfer.setData('text', imageSrc);
          }

          $(drag).addClass('drag-active');

        }

        //called as the draggable enters a droppable
        //needs to return false to make droppable area valid
        function dragEnter(event) {

          var drop = this;

          //set the drop effect for this zone
          event.dataTransfer.dropEffect = 'copy';
          $(drop).addClass('drop-active');

          event.preventDefault();
          event.stopPropagation();

        }

        //called continually while the draggable is over a droppable
        //needs to return false to make droppable area valid
        function dragOver(event) {
          var drop = this;

          //set the drop effect for this zone
          event.dataTransfer.dropEffect = 'copy';
          $(drop).addClass('drop-active');

          event.preventDefault();
          event.stopPropagation();
        }

        //called when the draggable was inside a droppable but then left
        function dragLeave(event) {
          var drop = this;
          $(drop).removeClass('drop-active');
        }

        //called continually as the draggable is dragged
        function drag(event) {

        }

        //called when the draggable has been released (either on droppable or not)
        //may be called on invalid or valid drop
        function dragEnd(event) {

          var drag = this;
          $(drag).removeClass('drag-active');

        }

        //called when draggable is dropped on droppable
        //final process, used to copy data or update UI on successful drop
        function drop(event) {

          drop = this;
          $(drop).removeClass('drop-active');

          var dataList, dataHTML, dataText;

          //collect our data (based on what browser support we have)
          try {
            dataList = event.dataTransfer.getData('text/uri-list');
            dataHTML = event.dataTransfer.getData('text/html');
          } catch (e) {;
            dataText = event.dataTransfer.getData('text');
          }

          //we have access to the HTML
          if (dataHTML) {
            $(drop).empty();
            $(drop).prepend(dataHTML);
            var drag = $(drop).find('.drag');
          }
          //only have access to text (old browsers + IE)
          else {
            $(drop).empty();
            $(drop).prepend($(dragItem).clone());
            var drag = $(drop).find('.drag');
          }

          //check if this element is in the right spot
          checkCorrectDrop(drop, drag);
          //see if the final image is complete
          checkCorrectFinalImage();

          event.preventDefault();
          event.stopPropagation();
        }

        //check to see if this dropped item is in the correct spot
        function checkCorrectDrop(drop, drag) {

          //check if this drop is correct
          var imageValue = $(drag).attr('data-value');
          var dropValue = $(drop).attr('data-value');

          if (imageValue == dropValue) {
            $(drop).removeClass('incorrect').addClass('correct');
            //make the dropped item no longer draggable (removing the attr)
            $(drag).attr('draggable', 'false');

            //hide the original drag item (set during dragStart), we don't need it anymore
            $(dragItem).hide();

          } else {
            $(drop).removeClass('correct').addClass('incorrect');
          }

        }

        //checks to see if the dropped images are in the correct locations
        function checkCorrectFinalImage() {

          var correctItems = drop_items.filter('.correct');
          if (correctItems.length == drop_items.length) {
            $('.message-container').empty();
            $('.message-container').append('<h5>Шумо бурд кардед!</h5>');
          } else {
            $('.message-container').empty();
          }
        }

        //Reset the drop containers
        $('.reset-button').on('click', function() {
          $('.dnd-image-drag').find('.drop').children('img').remove();
          $('.dnd-image-drag').find('.drop').removeClass('correct incorrect');
          $('.message-container').empty();
          $('.dnd-image-drag .drag').show();
        });

        // check for ie
        var userAgent = window.navigator.userAgent;
        if (userAgent.indexOf('MSIE') != -1) {
          $('.ie-message').show();
        }

      });
