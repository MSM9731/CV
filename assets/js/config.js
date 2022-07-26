const WARN = "warn",
ERROR = "error",
DONE = 'success';

function sendResponse(status, message) {
  return {
    status: status,
    message: message
  }
}