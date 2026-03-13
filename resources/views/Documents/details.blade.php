@section('metodosjs')
    @include('Documents.js_documents')
@endsection

<x-app-layout>  
    <div class="py-3">
        <div class="">

            <div class="row">
                <div class="col-md-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-header bg-success text-white">
                                    <h3 class="mb-0">Lorem ipsum dolor sit amet</h3>
                                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                                </div>
                                <div class="card-body p-4">
                                    <div class="mb-4">
                                        <label for="appointmentService" class="form-label">Lorem ipsum *</label>
                                        <select class="form-select" id="appointmentService" required>
                                            <option selected disabled value="">Lorem ipsum</option>
                                            <option value="consultation">Lorem ipsum</option>
                                            <option value="followup">Lorem ipsum</option>
                                            <option value="emergency">Lorem ipsum</option>
                                            <option value="routine">Lorem ipsum</option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="appointmentDate" class="form-label">Lorem ipsum *</label>
                                            <input type="date" class="form-control" id="appointmentDate" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="appointmentTime" class="form-label">Lorem ipsum *</label>
                                            <select class="form-select" id="appointmentTime" required>
                                                <option selected disabled value="">Select time</option>
                                                <option>9:00 AM</option>
                                                <option>10:00 AM</option>
                                                <option>11:00 AM</option>
                                                <option>1:00 PM</option>
                                                <option>2:00 PM</option>
                                                <option>3:00 PM</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="appointmentDuration" class="form-label">Lorem ipsum</label>
                                        <select class="form-select" id="appointmentDuration">
                                            <option selected>30 minutes</option>
                                            <option>60 minutes</option>
                                            <option>90 minutes</option>
                                        </select>
                                    </div>

                                    <h5 class="mt-4 mb-3">Lorem ipsum</h5>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="appointmentFirstName" class="form-label">Lorem ipsum *</label>
                                            <input type="text" class="form-control" id="appointmentFirstName" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="appointmentLastName" class="form-label">Lorem ipsum *</label>
                                            <input type="text" class="form-control" id="appointmentLastName" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="appointmentEmail" class="form-label">Lorem ipsum *</label>
                                        <input type="email" class="form-control" id="appointmentEmail" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="appointmentReason" class="form-label">Lorem ipsum *</label>
                                        <textarea class="form-control" id="appointmentReason" rows="3" required></textarea>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-success btn-lg">Book Appointment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="mb-0">Lorem ipsum dolor sit amet</h3>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                </div>
                                <div class="card-body p-4">
                                    <form>
                                        <!-- Drag & Drop Area -->
                                        <div class="mb-4">
                                            <div class="border-2 border-dashed rounded p-5 text-center"
                                                style="border-color: #dee2e6; border-style: dashed;" id="dropArea">
                                                <i class="bi bi-cloud-upload display-4 text-muted mb-3"></i>
                                                <h5>Drag & drop files here</h5>
                                                <p class="text-muted">or click to browse</p>
                                                <input type="file" class="d-none" id="fileInput" multiple>
                                                <button type="button" class="btn btn-outline-primary mt-2"
                                                    onclick="document.getElementById('fileInput').click()">
                                                    Browse Files
                                                </button>
                                                <p class="small text-muted mt-3 mb-0">
                                                    Maximum file size: 10MB. Allowed formats: PDF, DOC, JPG, PNG
                                                </p>
                                            </div>
                                            <div id="fileList" class="mt-3"></div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="uploadCategory" class="form-label">Category</label>
                                            <select class="form-select" id="uploadCategory">
                                                <option selected>Documents</option>
                                                <option>Images</option>
                                                <option>Videos</option>
                                                <option>Audio</option>
                                                <option>Other</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="uploadDescription" class="form-label">Description (Optional)</label>
                                            <textarea class="form-control" id="uploadDescription" rows="3"
                                                placeholder="Add a description for your files"></textarea>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <button type="reset" class="btn btn-outline-secondary">Clear All</button>
                                            <button type="submit" class="btn btn-primary">Upload Files</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>