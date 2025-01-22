            <pre class="text-center my-1">or</pre>
            <button type="button" class="btn btn-success" title="Sign Up with Credentials." onclick="validateSignup()">
              Sign Up
            </button>

            <!-- User Type Popup -->
            <div class="modal fade" id="userTypeModal" tabindex="-1" aria-labelledby="userTypeModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="userTypeModalLabel">
                      Select User Type
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <select name="usertype" class="form-select" form="authForm" required>
                      <option value="teacher">Teacher</option>
                      <option value="admin">Admin</option>
                      <option value="comity-staff">Comity Staff</option>
                      <option value="office-staff">Office Staff</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                      Close
                    </button>
                    <button type="submit" name="action" value="signup" class="btn btn-success" form="authForm">
                      Sign Up
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Username and Password Alert Modal -->
            <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Please fill in Username and Password to Sign Up.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                      Ok
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <script src="src/js/signup.js"></script>