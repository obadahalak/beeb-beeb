@extends('layouts.adminlayout')
@section('content')

<section class="intro">
    <div class="bg-image h-100" style="background-color: #f5f7fa;">
      <div class="mask d-flex align-items-center h-100">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card">
                <div class="card-body p-0">
                  <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                    <table class="table table-striped mb-0">
                      <thead style="background-color: #002d72;">
                        <tr>
                          <th scope="col">Class name</th>
                          <th scope="col">Type</th>
                          <th scope="col">Hours</th>
                          <th scope="col">Trainer</th>
                          <th scope="col">Spots</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Like a butterfly</td>
                          <td>Boxing</td>
                          <td>9:00 AM - 11:00 AM</td>
                          <td>Aaron Chapman</td>
                          <td>10</td>
                        </tr>
                        <tr>
                          <td>Mind &amp; Body</td>
                          <td>Yoga</td>
                          <td>8:00 AM - 9:00 AM</td>
                          <td>Adam Stewart</td>
                          <td>15</td>
                        </tr>
                        <tr>
                          <td>Crit Cardio</td>
                          <td>Gym</td>
                          <td>9:00 AM - 10:00 AM</td>
                          <td>Aaron Chapman</td>
                          <td>10</td>
                        </tr>
                        <tr>
                          <td>Wheel Pose Full Posture</td>
                          <td>Yoga</td>
                          <td>7:00 AM - 8:30 AM</td>
                          <td>Donna Wilson</td>
                          <td>15</td>
                        </tr>
                        <tr>
                          <td>Playful Dancer's Flow</td>
                          <td>Yoga</td>
                          <td>8:00 AM - 9:00 AM</td>
                          <td>Donna Wilson</td>
                          <td>10</td>
                        </tr>
                        <tr>
                          <td>Zumba Dance</td>
                          <td>Dance</td>
                          <td>5:00 PM - 7:00 PM</td>
                          <td>Donna Wilson</td>
                          <td>20</td>
                        </tr>
                        <tr>
                          <td>Cardio Blast</td>
                          <td>Gym</td>
                          <td>5:00 PM - 7:00 PM</td>
                          <td>Randy Porter</td>
                          <td>10</td>
                        </tr>
                        <tr>
                          <td>Pilates Reformer</td>
                          <td>Gym</td>
                          <td>8:00 AM - 9:00 AM</td>
                          <td>Randy Porter</td>
                          <td>10</td>
                        </tr>
                        <tr>
                          <td>Supple Spine and Shoulders</td>
                          <td>Yoga</td>
                          <td>6:30 AM - 8:00 AM</td>
                          <td>Randy Porter</td>
                          <td>15</td>
                        </tr>
                        <tr>
                          <td>Yoga for Divas</td>
                          <td>Yoga</td>
                          <td>9:00 AM - 11:00 AM</td>
                          <td>Donna Wilson</td>
                          <td>20</td>
                        </tr>
                        <tr>
                          <td>Virtual Cycle</td>
                          <td>Gym</td>
                          <td>8:00 AM - 9:00 AM</td>
                          <td>Randy Porter</td>
                          <td>20</td>
                        </tr>
                        <tr>
                          <td>Like a butterfly</td>
                          <td>Boxing</td>
                          <td>9:00 AM - 11:00 AM</td>
                          <td>Aaron Chapman</td>
                          <td>10</td>
                        </tr>
                        <tr>
                          <td>Mind &amp; Body</td>
                          <td>Yoga</td>
                          <td>8:00 AM - 9:00 AM</td>
                          <td>Adam Stewart</td>
                          <td>15</td>
                        </tr>
                        <tr>
                          <td>Crit Cardio</td>
                          <td>Gym</td>
                          <td>9:00 AM - 10:00 AM</td>
                          <td>Aaron Chapman</td>
                          <td>10</td>
                        </tr>
                        <tr>
                          <td>Wheel Pose Full Posture</td>
                          <td>Yoga</td>
                          <td>7:00 AM - 8:30 AM</td>
                          <td>Donna Wilson</td>
                          <td>15</td>
                        </tr>
                        <tr>
                          <td>Playful Dancer's Flow</td>
                          <td>Yoga</td>
                          <td>8:00 AM - 9:00 AM</td>
                          <td>Donna Wilson</td>
                          <td>10</td>
                        </tr>
                        <tr>
                          <td>Zumba Dance</td>
                          <td>Dance</td>
                          <td>5:00 PM - 7:00 PM</td>
                          <td>Donna Wilson</td>
                          <td>20</td>
                        </tr>
                        <tr>
                          <td>Cardio Blast</td>
                          <td>Gym</td>
                          <td>5:00 PM - 7:00 PM</td>
                          <td>Randy Porter</td>
                          <td>10</td>
                        </tr>
                        <tr>
                          <td>Pilates Reformer</td>
                          <td>Gym</td>
                          <td>8:00 AM - 9:00 AM</td>
                          <td>Randy Porter</td>
                          <td>10</td>
                        </tr>
                        <tr>
                          <td>Supple Spine and Shoulders</td>
                          <td>Yoga</td>
                          <td>6:30 AM - 8:00 AM</td>
                          <td>Randy Porter</td>
                          <td>15</td>
                        </tr>
                        <tr>
                          <td>Yoga for Divas</td>
                          <td>Yoga</td>
                          <td>9:00 AM - 11:00 AM</td>
                          <td>Donna Wilson</td>
                          <td>20</td>
                        </tr>
                        <tr>
                          <td>Virtual Cycle</td>
                          <td>Gym</td>
                          <td>8:00 AM - 9:00 AM</td>
                          <td>Randy Porter</td>
                          <td>20</td>
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
    </div>
  </section>


@endsection
