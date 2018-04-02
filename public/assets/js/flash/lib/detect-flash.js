'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.detectFlash = detectFlash;

var _swfobject = require('swfobject');

var _swfobject2 = _interopRequireDefault(_swfobject);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var TIMEOUT = 1000;
var ID = '__flash_detector';
var CALLBACK = ID + '_call';

function clear(el) {
  document.body.removeChild(el);
  delete window[CALLBACK];
}

/**
 * Detects if Adobe Flash is actually alive in a browser
 * @param {string} swfPath - The path to FlashDetector.swf
 * @param {number} [timeout=TIMEOUT(1000)] The milliseconds of your detection timeout
 * @returns {Promise} Returns a Promise object which is resolved only when Flash plugin is alive
 */
function detectFlash(swfPath) {
  var timeout = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : TIMEOUT;

  return new Promise(function (resolve, reject) {
    if (!navigator.plugins['Shockwave Flash']) {
      reject();
      return;
    }
    var el = document.createElement('DIV');
    var wrapper = el.cloneNode();

    el.id = ID;
    wrapper.style.left = '-9999px';
    wrapper.style.top = '-9999px';
    wrapper.style.position = 'absolute';
    wrapper.appendChild(el);
    document.body.appendChild(wrapper);

    var timeoutId = setTimeout(function () {
      clear(wrapper, el.id);
      reject();
    }, timeout);

    window[CALLBACK] = function callbackFromFlashDetector() {
      clearTimeout(timeoutId);
      setTimeout(function () {
        return clear(wrapper);
      }, 0);
      resolve();
    };

    _swfobject2.default.embedSWF(swfPath, el.id, '10', '10', '10.0.0');
  });
}

exports.default = detectFlash;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4uL2RldGVjdC1mbGFzaC5qcyJdLCJuYW1lcyI6WyJkZXRlY3RGbGFzaCIsIlRJTUVPVVQiLCJJRCIsIkNBTExCQUNLIiwiY2xlYXIiLCJlbCIsImRvY3VtZW50IiwiYm9keSIsInJlbW92ZUNoaWxkIiwid2luZG93Iiwic3dmUGF0aCIsInRpbWVvdXQiLCJQcm9taXNlIiwicmVzb2x2ZSIsInJlamVjdCIsIm5hdmlnYXRvciIsInBsdWdpbnMiLCJjcmVhdGVFbGVtZW50Iiwid3JhcHBlciIsImNsb25lTm9kZSIsImlkIiwic3R5bGUiLCJsZWZ0IiwidG9wIiwicG9zaXRpb24iLCJhcHBlbmRDaGlsZCIsInRpbWVvdXRJZCIsInNldFRpbWVvdXQiLCJjYWxsYmFja0Zyb21GbGFzaERldGVjdG9yIiwiY2xlYXJUaW1lb3V0IiwiZW1iZWRTV0YiXSwibWFwcGluZ3MiOiI7Ozs7O1FBaUJnQkEsVyxHQUFBQSxXOztBQWpCaEI7Ozs7OztBQUVBLElBQU1DLFVBQVUsSUFBaEI7QUFDQSxJQUFNQyxLQUFLLGtCQUFYO0FBQ0EsSUFBTUMsV0FBY0QsRUFBZCxVQUFOOztBQUVBLFNBQVNFLEtBQVQsQ0FBZUMsRUFBZixFQUFtQjtBQUNqQkMsV0FBU0MsSUFBVCxDQUFjQyxXQUFkLENBQTBCSCxFQUExQjtBQUNBLFNBQU9JLE9BQU9OLFFBQVAsQ0FBUDtBQUNEOztBQUVEOzs7Ozs7QUFNTyxTQUFTSCxXQUFULENBQXFCVSxPQUFyQixFQUFpRDtBQUFBLE1BQW5CQyxPQUFtQix1RUFBVFYsT0FBUzs7QUFDdEQsU0FBTyxJQUFJVyxPQUFKLENBQVksVUFBQ0MsT0FBRCxFQUFVQyxNQUFWLEVBQXFCO0FBQ3RDLFFBQUksQ0FBQ0MsVUFBVUMsT0FBVixDQUFrQixpQkFBbEIsQ0FBTCxFQUEyQztBQUN6Q0Y7QUFDQTtBQUNEO0FBQ0QsUUFBTVQsS0FBS0MsU0FBU1csYUFBVCxDQUF1QixLQUF2QixDQUFYO0FBQ0EsUUFBTUMsVUFBVWIsR0FBR2MsU0FBSCxFQUFoQjs7QUFFQWQsT0FBR2UsRUFBSCxHQUFRbEIsRUFBUjtBQUNBZ0IsWUFBUUcsS0FBUixDQUFjQyxJQUFkLEdBQXFCLFNBQXJCO0FBQ0FKLFlBQVFHLEtBQVIsQ0FBY0UsR0FBZCxHQUFvQixTQUFwQjtBQUNBTCxZQUFRRyxLQUFSLENBQWNHLFFBQWQsR0FBeUIsVUFBekI7QUFDQU4sWUFBUU8sV0FBUixDQUFvQnBCLEVBQXBCO0FBQ0FDLGFBQVNDLElBQVQsQ0FBY2tCLFdBQWQsQ0FBMEJQLE9BQTFCOztBQUVBLFFBQU1RLFlBQVlDLFdBQVcsWUFBTTtBQUNqQ3ZCLFlBQU1jLE9BQU4sRUFBZWIsR0FBR2UsRUFBbEI7QUFDQU47QUFDRCxLQUhpQixFQUdmSCxPQUhlLENBQWxCOztBQUtBRixXQUFPTixRQUFQLElBQW1CLFNBQVN5Qix5QkFBVCxHQUFxQztBQUN0REMsbUJBQWFILFNBQWI7QUFDQUMsaUJBQVc7QUFBQSxlQUFNdkIsTUFBTWMsT0FBTixDQUFOO0FBQUEsT0FBWCxFQUFpQyxDQUFqQztBQUNBTDtBQUNELEtBSkQ7O0FBTUEsd0JBQVVpQixRQUFWLENBQW1CcEIsT0FBbkIsRUFBNEJMLEdBQUdlLEVBQS9CLEVBQW1DLElBQW5DLEVBQXlDLElBQXpDLEVBQStDLFFBQS9DO0FBQ0QsR0EzQk0sQ0FBUDtBQTRCRDs7a0JBRWNwQixXIiwiZmlsZSI6ImRldGVjdC1mbGFzaC5qcyIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCBzd2ZvYmplY3QgZnJvbSAnc3dmb2JqZWN0JztcblxuY29uc3QgVElNRU9VVCA9IDEwMDA7XG5jb25zdCBJRCA9ICdfX2ZsYXNoX2RldGVjdG9yJztcbmNvbnN0IENBTExCQUNLID0gYCR7SUR9X2NhbGxgO1xuXG5mdW5jdGlvbiBjbGVhcihlbCkge1xuICBkb2N1bWVudC5ib2R5LnJlbW92ZUNoaWxkKGVsKTtcbiAgZGVsZXRlIHdpbmRvd1tDQUxMQkFDS107XG59XG5cbi8qKlxuICogRGV0ZWN0cyBpZiBBZG9iZSBGbGFzaCBpcyBhY3R1YWxseSBhbGl2ZSBpbiBhIGJyb3dzZXJcbiAqIEBwYXJhbSB7c3RyaW5nfSBzd2ZQYXRoIC0gVGhlIHBhdGggdG8gRmxhc2hEZXRlY3Rvci5zd2ZcbiAqIEBwYXJhbSB7bnVtYmVyfSBbdGltZW91dD1USU1FT1VUKDEwMDApXSBUaGUgbWlsbGlzZWNvbmRzIG9mIHlvdXIgZGV0ZWN0aW9uIHRpbWVvdXRcbiAqIEByZXR1cm5zIHtQcm9taXNlfSBSZXR1cm5zIGEgUHJvbWlzZSBvYmplY3Qgd2hpY2ggaXMgcmVzb2x2ZWQgb25seSB3aGVuIEZsYXNoIHBsdWdpbiBpcyBhbGl2ZVxuICovXG5leHBvcnQgZnVuY3Rpb24gZGV0ZWN0Rmxhc2goc3dmUGF0aCwgdGltZW91dCA9IFRJTUVPVVQpIHtcbiAgcmV0dXJuIG5ldyBQcm9taXNlKChyZXNvbHZlLCByZWplY3QpID0+IHtcbiAgICBpZiAoIW5hdmlnYXRvci5wbHVnaW5zWydTaG9ja3dhdmUgRmxhc2gnXSkge1xuICAgICAgcmVqZWN0KCk7XG4gICAgICByZXR1cm47XG4gICAgfVxuICAgIGNvbnN0IGVsID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnRElWJyk7XG4gICAgY29uc3Qgd3JhcHBlciA9IGVsLmNsb25lTm9kZSgpO1xuXG4gICAgZWwuaWQgPSBJRDtcbiAgICB3cmFwcGVyLnN0eWxlLmxlZnQgPSAnLTk5OTlweCc7XG4gICAgd3JhcHBlci5zdHlsZS50b3AgPSAnLTk5OTlweCc7XG4gICAgd3JhcHBlci5zdHlsZS5wb3NpdGlvbiA9ICdhYnNvbHV0ZSc7XG4gICAgd3JhcHBlci5hcHBlbmRDaGlsZChlbCk7XG4gICAgZG9jdW1lbnQuYm9keS5hcHBlbmRDaGlsZCh3cmFwcGVyKTtcblxuICAgIGNvbnN0IHRpbWVvdXRJZCA9IHNldFRpbWVvdXQoKCkgPT4ge1xuICAgICAgY2xlYXIod3JhcHBlciwgZWwuaWQpO1xuICAgICAgcmVqZWN0KCk7XG4gICAgfSwgdGltZW91dCk7XG5cbiAgICB3aW5kb3dbQ0FMTEJBQ0tdID0gZnVuY3Rpb24gY2FsbGJhY2tGcm9tRmxhc2hEZXRlY3RvcigpIHtcbiAgICAgIGNsZWFyVGltZW91dCh0aW1lb3V0SWQpO1xuICAgICAgc2V0VGltZW91dCgoKSA9PiBjbGVhcih3cmFwcGVyKSwgMCk7XG4gICAgICByZXNvbHZlKCk7XG4gICAgfTtcblxuICAgIHN3Zm9iamVjdC5lbWJlZFNXRihzd2ZQYXRoLCBlbC5pZCwgJzEwJywgJzEwJywgJzEwLjAuMCcpO1xuICB9KTtcbn1cblxuZXhwb3J0IGRlZmF1bHQgZGV0ZWN0Rmxhc2g7XG4iXX0=