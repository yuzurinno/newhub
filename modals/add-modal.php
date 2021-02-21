<!-- Modal -->
<div class="modal fade" id="customModalTwo" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customModalTwoLabel">Add Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="px_code" class="col-form-label">PX Code:</label>
                                <input type="text" class="form-control" name="px_code" id="px_code" placeholder="PX Code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kp_class" class="col-form-label">KP Class:</label>
                                <select class="form-control" name="kp_class" id="kp_class" required>
                                    <option value="" selected disabled>Select KP Class</option>
                                    <option value="Class 1">Class 1</option>
                                    <option value="Class 2">Class 2</option>
                                    <option value="Class 3">Class 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="basicExample" class="table m-0">
                            <thead>
                                <tr>
                                    <th>Drug</th>
                                    <th># of pills/day</th>
                                    <th># of pills missed (past 30 days)</th>
                                    <th># of pills left</th>
                                    <th>Date discontinued</th>
                                    <th>Reason</th>
                                    <th><button type="button" class="btn btn-success btn-sm"><i class="icon-plus nav-icon"></i></button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" name="kp_class" id="kp_class" required>
                                            <option value="" selected disabled>Select Drug</option>
                                            <option value="Drug 1">Drug 1</option>
                                            <option value="Drug 2">Drug 2</option>
                                            <option value="Drug 3">Drug 3</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" name="no_of_pill"></td>
                                    <td><input type="number" class="form-control" name="pill_missed"></td>
                                    <td><input type="number" class="form-control" name="pills_left"></td>
                                    <td><input type="date" class="form-control" name="date_discontinued"></td>
                                    <td>
                                        <select class="form-control" name="kp_class" id="kp_class" required>
                                            <option value="" selected disabled>Select Reason</option>
                                            <option value="Reason 1">Reason 1</option>
                                            <option value="Reason 2">Reason 2</option>
                                            <option value="Reason 3">Reason 3</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm"><i class="icon-trash nav-icon"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="check_tb" id="check_tb">
                        <label class="custom-control-label" for="check_tb">Active TB?</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer custom">

                <div class="left-side">
                    <button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
                </div>
                <div class="divider"></div>
                <div class="right-side">
                    <button type="submit" class="btn btn-link success"><i class="icon-save nav-icon"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
