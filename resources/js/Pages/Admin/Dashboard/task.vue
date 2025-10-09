<template>
    <DashboardLayout title="Task">
        <template #content>

            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row task">
                                        <div class="col-xl-2 col-sm-4 col-6">
                                            <div class="task-summary">
                                                <div class="d-flex align-items-baseline">
                                                    <h2 class="text-primary count">8</h2>
                                                    <span>Not Started</span>
                                                </div>
                                                <p>Tasks assigne</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-sm-4 col-6">
                                            <div class="task-summary task-sven">
                                                <div class="d-flex align-items-baseline">
                                                    <h2 class="text-purple count">7</h2>
                                                    <span>In Progress</span>
                                                </div>
                                                <p>Tasks assigne</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-sm-4 col-6">
                                            <div class="task-summary task-odd">
                                                <div class="d-flex align-items-baseline">
                                                    <h2 class="text-warning count">13</h2>
                                                    <span>Testing</span>
                                                </div>
                                                <p>Tasks assigne</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-sm-4 col-6">
                                            <div class="task-summary task-eleven">
                                                <div class="d-flex align-items-baseline">
                                                    <h2 class="text-danger count">11</h2>
                                                    <span>Awaiting</span>
                                                </div>
                                                <p>Tasks assigne</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-sm-4 col-6">
                                            <div class="task-summary">
                                                <div class="d-flex align-items-baseline">
                                                    <h2 class="text-success count">21</h2>
                                                    <span>Complete</span>
                                                </div>
                                                <p>Tasks assigne</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-sm-4 col-6">
                                            <div class="task-summary task-even">
                                                <div class="d-flex align-items-baseline">
                                                    <h2 class="text-danger count">16</h2>
                                                    <span>Pending</span>
                                                </div>
                                                <p>Tasks assigne</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects task-table">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0">Task</h4>
                                        </div>
                                        <table id="empoloyeestbl2" class="table">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" class="form-check-input" id="checkAll"
                                                            required="">
                                                    </th>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Assigned To</th>
                                                    <th>Tags</th>
                                                    <th class="text-end">Priority</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox3" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox3"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>03</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>Create Frontend WordPress</h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="complete">Complete</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="testing">Testing</option>
                                                            <option value="progress">In Progress</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="Medium">Medium</option>
                                                            <option value="High">High</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox4" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox4"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>04</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>HTML To React Convert </h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="testing">Testing</option>
                                                            <option value="complete">Complete</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="progress">In Progress</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="High">High</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox5" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox5"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>05</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>HTML template Issue Complete</h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="pending">Pending</option>
                                                            <option value="testing">Testing</option>
                                                            <option value="complete">Complete</option>
                                                            <option value="progress">In Progress</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic1.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="High">High</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox6" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox6"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>06</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>Complete Admin Dashboard Project</h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="progress">In Progress</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="testing">Testing</option>
                                                            <option value="complete">Complete</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic1.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="Low">Low</option>
                                                            <option value="High">High</option>
                                                            <option value="Medium">Medium</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox7" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox7"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>07</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>Create Frontend WordPress</h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="complete">Complete</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="testing">Testing</option>
                                                            <option value="progress">In Progress</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="Medium">Medium</option>
                                                            <option value="High">High</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox8" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox8"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>08</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>HTML To React Convert </h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="testing">Testing</option>
                                                            <option value="complete">Complete</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="progress">In Progress</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="High">High</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox9" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox9"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>09</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>HTML template Issue Complete</h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="pending">Pending</option>
                                                            <option value="testing">Testing</option>
                                                            <option value="complete">Complete</option>
                                                            <option value="progress">In Progress</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic1.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="High">High</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox10" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox10"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>10</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>Complete Admin Dashboard Project</h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="progress">In Progress</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="testing">Testing</option>
                                                            <option value="complete">Complete</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic1.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="Low">Low</option>
                                                            <option value="High">High</option>
                                                            <option value="Medium">Medium</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox11" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox11"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>11</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>Create Frontend WordPress</h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="complete">Complete</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="testing">Testing</option>
                                                            <option value="progress">In Progress</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="Medium">Medium</option>
                                                            <option value="High">High</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox12" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox12"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>12</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>HTML To React Convert </h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="testing">Testing</option>
                                                            <option value="complete">Complete</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="progress">In Progress</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="High">High</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <!-- start -->
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox13" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox13"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>03</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>Create Frontend WordPress</h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="complete">Complete</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="testing">Testing</option>
                                                            <option value="progress">In Progress</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="Medium">Medium</option>
                                                            <option value="High">High</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox14" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox14"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>04</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>HTML To React Convert </h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="testing">Testing</option>
                                                            <option value="complete">Complete</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="progress">In Progress</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="High">High</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox15" required>
                                                            <label class="form-check-label"
                                                                for="customCheckBox15"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>05</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>HTML template Issue Complete</h6>
                                                                <span>INV-100023456</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="default-select status-select">
                                                            <option value="pending">Pending</option>
                                                            <option value="testing">Testing</option>
                                                            <option value="complete">Complete</option>
                                                            <option value="progress">In Progress</option>
                                                        </select>
                                                    </td>
                                                    <td><span>06 Feb 2023</span></td>
                                                    <td>
                                                        <span>19 Feb 2023</span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic555.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic1.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                            <img src="images/contacts/pic666.jpg"
                                                                class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-primary light border-0 me-1">Issue</span>
                                                        <span
                                                            class="badge badge-secondary light border-0 ms-1">HTML</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <select class="default-select status-select">
                                                            <option value="High">High</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="offcanvasExample">
                <div class="offcanvas-header">
                    <h5 class="modal-title" id="#gridSystemModal">Add Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="offcanvas-body">
                    <div class="container-fluid">
                        <div>
                            <label>Profile Picture</label>
                            <div class="dz-default dlab-message upload-img mb-3">
                                <form action="#" class="dropzone">
                                    <svg width="41" height="40" viewBox="0 0 41 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M20.5 20V35" stroke="#DADADA" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M34.4833 30.6501C36.1088 29.7638 37.393 28.3615 38.1331 26.6644C38.8731 24.9673 39.027 23.0721 38.5703 21.2779C38.1136 19.4836 37.0724 17.8926 35.6111 16.7558C34.1497 15.619 32.3514 15.0013 30.4999 15.0001H28.3999C27.8955 13.0488 26.9552 11.2373 25.6498 9.70171C24.3445 8.16614 22.708 6.94647 20.8634 6.1344C19.0189 5.32233 17.0142 4.93899 15.0001 5.01319C12.9861 5.0874 11.015 5.61722 9.23523 6.56283C7.45541 7.50844 5.91312 8.84523 4.7243 10.4727C3.53549 12.1002 2.73108 13.9759 2.37157 15.959C2.01205 17.9421 2.10678 19.9809 2.64862 21.9222C3.19047 23.8634 4.16534 25.6565 5.49994 27.1667"
                                            stroke="#DADADA" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="fallback">
                                        <input name="file" type="file" multiple>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <form>
                            <div class="row">
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Employee ID <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput2" class="form-label">Employee Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleFormControlInput2"
                                        placeholder="">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput3" class="form-label">Employee Email<span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="exampleFormControlInput3"
                                        placeholder="">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput4" class="form-label">Password<span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="exampleFormControlInput4"
                                        placeholder="">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Designation<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">Please select</option>
                                        <option value="html">Software Engineer</option>
                                        <option value="css">Civil Engineer</option>
                                        <option value="javascript">Web Doveloper</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Department<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">Please select</option>
                                        <option value="html">Software</option>
                                        <option value="css">Doit</option>
                                        <option value="javascript">Designing</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Country<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">Please select</option>
                                        <option value="html">Ind</option>
                                        <option value="css">USA</option>
                                        <option value="javascript">UK</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput88" class="form-label">Mobile<span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="exampleFormControlInput88"
                                        placeholder="">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Gender<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">Please select</option>
                                        <option value="html">Male</option>
                                        <option value="css">Female</option>
                                        <option value="javascript">Other</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput99" class="form-label">Joining Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="exampleFormControlInput99">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput8" class="form-label">Date of Birth<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="exampleFormControlInput8">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput10" class="form-label">Reporting To<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleFormControlInput10"
                                        placeholder="">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Language Select<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">Please select</option>
                                        <option value="html">English</option>
                                        <option value="css">Hindi</option>
                                        <option value="javascript">Canada</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">User Role<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">Please select</option>
                                        <option value="html">Parmanent</option>
                                        <option value="css">Parttime</option>
                                        <option value="javascript">Per Hours</option>
                                    </select>
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label class="form-label">Address<span class="text-danger">*</span></label>
                                    <textarea rows="2" class="form-control"></textarea>
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label class="form-label">About<span class="text-danger">*</span></label>
                                    <textarea rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary me-1">Help Desk</button>
                                <button class="btn btn-danger light ms-1">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="offcanvasExample1">
                <div class="offcanvas-header">
                    <h5 class="modal-title" id="#gridSystemModal1">Add New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="offcanvas-body">
                    <div class="container-fluid">
                        <form>
                            <div class="row">
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInputfirst" class="form-label">Title<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleFormControlInputfirst"
                                        placeholder="Title">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Project<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">Project</option>
                                        <option value="html">Salesmate</option>
                                        <option value="css">ActiveCampaign</option>
                                        <option value="javascript">Insightly</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInputthree" class="form-label">Start Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="exampleFormControlInputthree">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInputfour" class="form-label">End Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="exampleFormControlInputfour">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Estimated Hour<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="09:30"><span
                                            class="input-group-text"><i class="fas fa-clock"></i></span>
                                    </div>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Status<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">Status</option>
                                        <option value="html">In Progess</option>
                                        <option value="css">Pending</option>
                                        <option value="javascript">Completed</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">priority<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">priority</option>
                                        <option value="html">Hight</option>
                                        <option value="css">Medium</option>
                                        <option value="javascript">Low</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Category<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">Category</option>
                                        <option value="html">Designing</option>
                                        <option value="css">Development</option>
                                        <option value="javascript">react developer</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Permission<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">Permission</option>
                                        <option value="html">Public</option>
                                        <option value="css">Private</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Deadline add<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">Deadline</option>
                                        <option value="html">Yes</option>
                                        <option value="css">No</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Assigned to<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
                                        <option data-display="Select">Assigned</option>
                                        <option value="html">Bernard</option>
                                        <option value="css">Sergey Brin</option>
                                        <option value="javascript"> Larry Ellison</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Responsible Person<span
                                            class="text-danger">*</span></label>
                                    <input name='tagify' class="form-control py-0 ps-0" value='James, Harry'>

                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label class="form-label">Description<span class="text-danger">*</span></label>
                                    <textarea rows="3" class="form-control"></textarea>
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label class="form-label">Summary<span class="text-danger">*</span></label>
                                    <textarea rows="3" class="form-control"></textarea>
                                </div>

                            </div>
                            <div>
                                <button class="btn btn-primary me-1">Help Desk</button>
                                <button class="btn btn-danger light ms-1">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel1">Invite Employee</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <label class="form-label">Email ID<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="hello@gmail.com">
                                    <label class="form-label mt-3">Employment date<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="date">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label class="form-label mt-3">First Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-label mt-3">Last Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Surname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 invite">
                                        <label class="form-label">Send invitation email<span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control " placeholder="+ invite">
                                    </div>


                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </template>
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { ref, onMounted, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
</script>
