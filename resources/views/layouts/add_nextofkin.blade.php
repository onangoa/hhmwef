<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ get_favicon() }}">

    <title>{{ get_option('site_title', config('app.name')) }}</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
		<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;
  font-size: 16px;
  color: #2c2c2c;
}
body a {
  color: inherit;
  text-decoration: none;
}

.header__btn {
  transition-property: all;
  transition-duration: 0.2s;
  transition-timing-function: linear;
  transition-delay: 0s;
  padding: 10px 20px;
  display: inline-block;
  margin-right: 10px;
  background-color: #fff;
  border: 1px solid #2c2c2c;
  border-radius: 3px;
  cursor: pointer;
  outline: none;
}
.header__btn:last-child {
  margin-right: 0;
}
.header__btn:hover, .header__btn.js-active {
  color: #fff;
  background-color: #2c2c2c;
}

.header {
  max-width: 600px;
  margin: 50px auto;
  text-align: center;
}

.header__title {
  margin-bottom: 30px;
  font-size: 2.1rem;
}

.content {
  width: 95%;
  margin: 0 auto 50px;
}

.content__title {
  margin-bottom: 40px;
  font-size: 20px;
  text-align: center;
}

.content__title--m-sm {
  margin-bottom: 10px;
}

.multisteps-form__progress {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
}

.multisteps-form__progress-btn {
  transition-property: all;
  transition-duration: 0.15s;
  transition-timing-function: linear;
  transition-delay: 0s;
  position: relative;
  padding-top: 20px;
  color: rgba(108, 117, 125, 0.7);
  text-indent: -9999px;
  border: none;
  background-color: transparent;
  outline: none !important;
  cursor: pointer;
}
@media (min-width: 500px) {
  .multisteps-form__progress-btn {
    text-indent: 0;
  }
}
.multisteps-form__progress-btn:before {
  position: absolute;
  top: 0;
  left: 50%;
  display: block;
  width: 13px;
  height: 13px;
  content: '';
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  transition: all 0.15s linear 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
  transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
  transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
  border: 2px solid currentColor;
  border-radius: 50%;
  background-color: #fff;
  box-sizing: border-box;
  z-index: 3;
}
.multisteps-form__progress-btn:after {
  position: absolute;
  top: 5px;
  left: calc(-50% - 13px / 2);
  transition-property: all;
  transition-duration: 0.15s;
  transition-timing-function: linear;
  transition-delay: 0s;
  display: block;
  width: 100%;
  height: 2px;
  content: '';
  background-color: currentColor;
  z-index: 1;
}
.multisteps-form__progress-btn:first-child:after {
  display: none;
}
.multisteps-form__progress-btn.js-active {
  color: #007bff;
}
.multisteps-form__progress-btn.js-active:before {
  -webkit-transform: translateX(-50%) scale(1.2);
          transform: translateX(-50%) scale(1.2);
  background-color: currentColor;
}

.multisteps-form__form {
  position: relative;
}

.multisteps-form__panel {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 0;
  opacity: 0;
  visibility: hidden;
}
.multisteps-form__panel.js-active {
  height: auto;
  opacity: 1;
  visibility: visible;
}
.multisteps-form__panel[data-animation="scaleOut"] {
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
}
.multisteps-form__panel[data-animation="scaleOut"].js-active {
  transition-property: all;
  transition-duration: 0.2s;
  transition-timing-function: linear;
  transition-delay: 0s;
  -webkit-transform: scale(1);
          transform: scale(1);
}
.multisteps-form__panel[data-animation="slideHorz"] {
  left: 50px;
}
.multisteps-form__panel[data-animation="slideHorz"].js-active {
  transition-property: all;
  transition-duration: 0.25s;
  transition-timing-function: cubic-bezier(0.2, 1.13, 0.38, 1.43);
  transition-delay: 0s;
  left: 0;
}
.multisteps-form__panel[data-animation="slideVert"] {
  top: 30px;
}
.multisteps-form__panel[data-animation="slideVert"].js-active {
  transition-property: all;
  transition-duration: 0.2s;
  transition-timing-function: linear;
  transition-delay: 0s;
  top: 0;
}
.multisteps-form__panel[data-animation="fadeIn"].js-active {
  transition-property: all;
  transition-duration: 0.3s;
  transition-timing-function: linear;
  transition-delay: 0s;
}
.multisteps-form__panel[data-animation="scaleIn"] {
  -webkit-transform: scale(0.9);
          transform: scale(0.9);
}
.multisteps-form__panel[data-animation="scaleIn"].js-active {
  transition-property: all;
  transition-duration: 0.2s;
  transition-timing-function: linear;
  transition-delay: 0s;
  -webkit-transform: scale(1);
          transform: scale(1);
}

</style>
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
	
	@yield('js-script')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'></script> -->
<script>
     $('#register').on('click', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Serialize the form data
        var formData = $('#register-form').serialize();

        // Send the form data via AJAX
        $.ajax({
            url: 'https://sacco.kesmak.co.ke/api/register', // Replace with your server endpoint
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success response
                console.log('Form submitted successfully');
                console.log(response);
                alert('Registration successfull, pending aproval!');
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Form submission failed');
                console.error(xhr.responseText);
            }
        });
    });
    
    document.getElementById('add-child').addEventListener('click', function() {
        let container = document.getElementById('children-container');
        let childEntry = document.createElement('div');
        childEntry.classList.add('form-row', 'mt-4', 'child-entry');
        childEntry.innerHTML = `
            <div class="col-12 col-sm-4">
                <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Full Name" name="child_name[]"/>
            </div>
            <div class="col-12 col-sm-3 mt-4 mt-sm-0">
                <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Age" name="child_age[]"/>
            </div>
            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Contact" name="child_phone_number[]"/>
            </div>
            <div class="col-12 col-sm-1 mt-4 mt-sm-0">
                <button type="button" class="btn btn-danger remove-child">&times;</button>
            </div>
        `;
        container.appendChild(childEntry);
    });

    document.getElementById('children-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-child')) {
            let childEntries = document.querySelectorAll('.child-entry');
            if (childEntries.length > 1) {
                e.target.closest('.child-entry').remove();
            }
        }
    });

    document.getElementById('add-parent').addEventListener('click', function() {
        let container = document.getElementById('parents-container');
        let parentEntry = document.createElement('div');
        parentEntry.classList.add('form-row', 'mt-4', 'parent-entry');
        parentEntry.innerHTML = `
            <div class="col-12 col-sm-6">
                            <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Full Name" name="parent_name[]"/>
                          </div>
                          <div class="col-12 col-sm-5 mt-4 mt-sm-0">
                            <select class="multisteps-form__select form-control form-control-lg" name="parent_relationship[]">
                                <option>Select relationship...</option>
                                <option value="father">Father</option>
                                <option value="mother">Mother</option>
                                <option value="son">Son</option>
                                <option value="daughter">Daughter</option>
                                <option value="father-in-law">Father In law</option>
                                <option value="mother-in-law">Mother In law</option>
                              </select>
                          </div>
            <div class="col-12 col-sm-1 mt-4 mt-sm-0">
                <button type="button" class="btn btn-danger remove-parent">&times;</button>
            </div>
        `;
        container.appendChild(parentEntry);
    });

    document.getElementById('parents-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-parent')) {
            let childEntries = document.querySelectorAll('.parent-entry');
            if (childEntries.length > 1) {
                e.target.closest('.parent-entry').remove();
            }
        }
    });

   

const DOMstrings = {
  stepsBtnClass: 'multisteps-form__progress-btn',
  stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
  stepsBar: document.querySelector('.multisteps-form__progress'),
  stepsForm: document.querySelector('.multisteps-form__form'),
  stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
  stepFormPanelClass: 'multisteps-form__panel',
  stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
  stepPrevBtnClass: 'js-btn-prev',
  stepNextBtnClass: 'js-btn-next' };


//remove class from a set of items
const removeClasses = (elemSet, className) => {

  elemSet.forEach(elem => {

    elem.classList.remove(className);

  });

};

//return exect parent node of the element
const findParent = (elem, parentClass) => {

  let currentNode = elem;

  while (!currentNode.classList.contains(parentClass)) {
    currentNode = currentNode.parentNode;
  }

  return currentNode;

};

//get active button step number
const getActiveStep = elem => {
  return Array.from(DOMstrings.stepsBtns).indexOf(elem);
};

//set all steps before clicked (and clicked too) to active
const setActiveStep = activeStepNum => {

  //remove active state from all the state
  removeClasses(DOMstrings.stepsBtns, 'js-active');

  //set picked items to active
  DOMstrings.stepsBtns.forEach((elem, index) => {

    if (index <= activeStepNum) {
      elem.classList.add('js-active');
    }

  });
};

//get active panel
const getActivePanel = () => {

  let activePanel;

  DOMstrings.stepFormPanels.forEach(elem => {

    if (elem.classList.contains('js-active')) {

      activePanel = elem;

    }

  });

  return activePanel;

};

//open active panel (and close unactive panels)
const setActivePanel = activePanelNum => {

  //remove active class from all the panels
  removeClasses(DOMstrings.stepFormPanels, 'js-active');

  //show active panel
  DOMstrings.stepFormPanels.forEach((elem, index) => {
    if (index === activePanelNum) {

      elem.classList.add('js-active');

      setFormHeight(elem);

    }
  });

};

//set form height equal to current panel height
const formHeight = activePanel => {

  const activePanelHeight = activePanel.offsetHeight;

  DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

};

const setFormHeight = () => {
  const activePanel = getActivePanel();

  formHeight(activePanel);
};

//STEPS BAR CLICK FUNCTION
DOMstrings.stepsBar.addEventListener('click', e => {

  //check if click target is a step button
  const eventTarget = e.target;

  if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
    return;
  }

  //get active button step number
  const activeStep = getActiveStep(eventTarget);

  //set all steps before clicked (and clicked too) to active
  setActiveStep(activeStep);

  //open active panel
  setActivePanel(activeStep);
});

//PREV/NEXT BTNS CLICK
DOMstrings.stepsForm.addEventListener('click', e => {
        const eventTarget = e.target;
        if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`))) {
            return;
        }

        const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);
        let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

        if (eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)) {
            let valid = true;
            // document.querySelectorAll('.child-entry').forEach(child => {
            //     let inputs = child.querySelectorAll('input');
            //     inputs.forEach(input => {
            //         let errorText = input.nextElementSibling;
            //         if (input.checkValidity()) {
            //             errorText.classList.add('d-none');
            //         } else {
            //             errorText.classList.remove('d-none');
            //             valid = false;
            //         }
            //     });
            // });

            // if (!valid) {
            //     e.preventDefault();
            //     return;
            // }
            activePanelNum++;
        } else {
            activePanelNum--;
        }

        setActiveStep(activePanelNum);
        setActivePanel(activePanelNum);
    });


const setAnimationType = newType => {
  DOMstrings.stepFormPanels.forEach(elem => {
    elem.dataset.animation = newType;
  });
};

//selector onchange - changing animation
const animationSelect = document.querySelector('.pick-animation__select');

animationSelect.addEventListener('change', () => {
  const newAnimationType = animationSelect.value;

  setAnimationType(newAnimationType);
});
</script>
</body>
</html>
