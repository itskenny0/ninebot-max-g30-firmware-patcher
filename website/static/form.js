var forms = {
  "VERSION": "version",
  "MAX_SPEED": "max_speed",
  "VERSION_SPOOFING": "version_spoofing",
  "MOTOR_POWER_CONSTANT": "motor_power_constant",
  "CRUISE_CONTROL_DELAY": "cruise_control_delay",
  "THROTTLE_ALG": "throttle_alg",
  "WHEEL_SPEED_CONST": "wheel_speed_const",
  "MOTOR_START_SPEED": "motor_start_speed",
  "REMOVE_CHARGING_MODE": "remove_charging_mode",
  "STAY_ON_LOCKED": "stay_on_locked",
  "BMS_UART_76800":"bms_uart_76800",
  "SWD_ENABLE":"swd_enable",
  "SPEED_NORMAL_KMH":"speed_normal_kmh",
  "SPEED_NORMAL_PHASE":"speed_normal_phase",
  "SPEED_NORMAL_BATTERY":"speed_normal_battery",
  "BYPASS_BMS":"bypass_BMS"
};

var formValues = Object.values(forms);
var queryStrings = window.location.search.substring(1);
var queries = queryStrings.split('&');

for (var i = 0; i < queries.length; i++) {
  var query = queries[i];
  var tmp = query.split('=');
  var found = false;

  for (var j = 0; j < formValues.length; j++) {
    if (formValues[j] === tmp[0]) {
      found = true;
      break;
    }
  }

  if(found) {
    if (tmp[1] === 'on') {
      tmp[1] = true;
    }

    ChangeForm(tmp[0], tmp[1], true);
  }
}

function GetForm(name) {
  return document.getElementsByName(name)[0];
}

function GetFormValue(name) {
  var o = GetForm(name);

  if (o.type === "checkbox") {
    return o.checked;
  }

  return o.value;
}

function GetPatchCheckBox(name) {
  var form = GetForm(name);
  return form.nextElementSibling && form.nextElementSibling.children[0]  && form.nextElementSibling.children[0].children[0];
}

function CheckForm(name, cb) {
  GetForm(name).disabled = !cb.checked;
}

function ChangeForm(name, value, patch) {
  var o = GetForm(name);

  if (o.type === "checkbox") {
    o.checked = value;
  } else {
    o.value = value;
  }

  if (typeof patch === 'boolean') {
    var cb = GetPatchCheckBox(name);

    if (cb && (patch != cb.checked)) {
      cb.click();
    }
  }
}

function Preset_Default() {
  ChangeForm(forms.VERSION, "DRV126");
  ChangeForm(forms.MAX_SPEED, "32", false);
  ChangeForm(forms.MOTOR_POWER_CONSTANT, "51575", false);
  ChangeForm(forms.CRUISE_CONTROL_DELAY, "5", false);
  ChangeForm(forms.VERSION_SPOOFING, false);
  ChangeForm(forms.THROTTLE_ALG, false);
  ChangeForm(forms.REMOVE_CHARGING_MODE, false);
  ChangeForm(forms.MOTOR_START_SPEED, "5", false);
  ChangeForm(forms.WHEEL_SPEED_CONST, "315", false);
  ChangeForm(forms.STAY_ON_LOCKED, false);
  ChangeForm(forms.BMS_UART_76800, false);
  ChangeForm(forms.SWD_ENABLE, false);
  ChangeForm(forms.BYPASS_BMS, false);
  ChangeForm(forms.SPEED_NORMAL_KMH, "33", false);
  ChangeForm(forms.SPEED_NORMAL_PHASE, "55000", false);
  ChangeForm(forms.SPEED_NORMAL_BATTERY, "25000", false);
}

function Preset_speed() {
  ChangeForm(forms.VERSION, "DRV126");
  ChangeForm(forms.MAX_SPEED, "32", true);
  ChangeForm(forms.MOTOR_POWER_CONSTANT, "51575", false);
  ChangeForm(forms.CRUISE_CONTROL_DELAY, "5", false);
  ChangeForm(forms.VERSION_SPOOFING, true);
  ChangeForm(forms.THROTTLE_ALG, false);
  ChangeForm(forms.REMOVE_CHARGING_MODE, false);
  ChangeForm(forms.WHEEL_SPEED_CONST, "315", false);
  ChangeForm(forms.STAY_ON_LOCKED, true);
  ChangeForm(forms.BMS_UART_76800, false);
  ChangeForm(forms.SWD_ENABLE, false);
  ChangeForm(forms.BYPASS_BMS, false);
}

function Share() {
  var url = location.protocol + '//' + location.host;
  var firstParam = true;

  function getSeparator() {
    if (firstParam) {
      firstParam = false;
      return '?';
    }

    return '&';
  }

  for (var i = 0; i < formValues.length; i++) {
    var form = formValues[i];

    var formValue = GetFormValue(form);
    var patchCheckbox = GetPatchCheckBox(form);

    if (patchCheckbox) {
      if (patchCheckbox.checked) {
        url += getSeparator() + form + '=' + formValue;
      }
    } else if (typeof formValue === 'boolean') {
      if (formValue) {
        url += getSeparator() + form + '=on';
      }
    } else {
        url += getSeparator() + form + '=' + formValue;
    }
  }

  var textArea = document.createElement("textarea");

  textArea.value = url;
  document.body.appendChild(textArea);

  textArea.focus();
  textArea.select();

  document.execCommand('copy');
  document.getElementById('shareConfirmation').innerText = 'Copied!';

  document.body.removeChild(textArea);
}

(function () {
  'use strict';

  /**
   * Toggles the disable state of the input associated to the checkbox
   *
   * @param {Event} event - Change event triggered when checkbox state changes
   */
  function toggleDisable(event) {
    const checkbox = event.target;
    const higherParent = checkbox.parentElement.parentElement;
    const relatedElement = higherParent.previousElementSibling;

    relatedElement.disabled = !relatedElement.disabled;
  }

  /**
   * Loads preset values into the form.
   *
   * @param {string} type - Preset to load
   */
  function loadPreset(type) {
    switch(type) {
      case 'default':
        Preset_Default();
        break;
      case 'speed':
        Preset_speed();
        break;
      default:
        Preset_Default();
        break;
    }
  }

  /**
   * Finds checkboxes responsible of enabling/disabling inputs and binds appropriated events on it.
   */
  function initPatchCheckboxes() {
    const patchCheckboxes = document.querySelectorAll('.patch-input');

    patchCheckboxes.forEach(checkbox => checkbox.addEventListener('change', toggleDisable));
  }

  /**
   * Finds buttons responsible of presets loading and binds appropriated events on it.
   */
  function initPresets() {
    document.querySelector('.preset--default').addEventListener('click', () => loadPreset('default'));
    document.querySelector('.preset--speed').addEventListener('click', () => loadPreset('speed'));
  }

  /**
   * Page initializer: initializes everything so that the page works properly.
   */
  function init() {
    initPatchCheckboxes();
    initPresets();
  }

  init();
}());