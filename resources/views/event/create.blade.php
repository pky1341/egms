@extends('layout')

@section('heading')
    Create Event
@endsection

@section('content')
    <section id="contact-map" class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="container-form wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="form-wrapper">
                            <form role="form" method="post" id="eventForm" name="event-form" data-toggle="validator"
                                action="{{ route('store.event') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-line">
                                        <div class="form-group">
                                            <label for="eventType">Event Type</label>
                                            <select class="form-control" id="eventType" name="event_type" required
                                                data-error="Please select event type">
                                                <option value="" selected disabled>Select Event Type</option>
                                                <option value="home_innogration">Home Innogration</option>
                                                <option value="engagement">Engagement</option>
                                                <option value="marriage">Marriage</option>
                                                <option value="baby_shower">Baby Shower</option>
                                                <option value="birthday">Birthday</option>
                                                <option value="opening_ceremony">Opening Ceremony</option>
                                                <option value="family_gather">Family Get Together</option>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-line">
                                        <div class="form-group">
                                            <label for="eventName">Event Name</label>
                                            <input type="text" class="form-control" id="eventName" name="event_name"
                                                placeholder="Event Name" required data-error="Please enter event name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-line">
                                        <div class="form-group">
                                            <label for="eventDate">Event Date</label>
                                            <input type="date" class="form-control" id="eventDate" name="event_date"
                                                required data-error="Please select event date">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-line">
                                        <div class="form-group">
                                            <label for="eventTime">Event Time</label>
                                            <input type="time" class="form-control" id="eventTime" name="event_time"
                                                required data-error="Please select event time">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-line">
                                        <div class="form-group">
                                            <label for="eventPlace">Event Place</label>
                                            <input type="text" class="form-control" id="eventPlace" name="event_place"
                                                placeholder="Event Place" required data-error="Please enter event place">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-line">
                                        <div class="form-group">
                                            <label for="guestCount">Number of guest</label>
                                            <input type="number" class="form-control" id="guestCount" name="guest_count"
                                                placeholder="Number of Guests" required
                                                data-error="Please enter number of guests">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-line">
                                        <div class="form-group">
                                            <label for="guestPartition">Select Partition</label>
                                            <select class="form-control" id="guestPartition" name="guest_partition" required
                                                data-error="Please select guest partition">
                                                <option value="" selected disabled>Select Guest Partition</option>
                                                <option value="single">Single Guest</option>
                                                <option value="couple">Two Guests</option>
                                                <option value="family">Full Family</option>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="eventDetails">Additional Details</label>
                                            <textarea class="form-control" rows="4" id="eventDetails" name="event_details"
                                                placeholder="Additional Important Details" required data-error="Please provide event details"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-submit">
                                            <button type="submit" class="btn btn-common" id="form-submit">
                                                <i class="fa fa-calendar-plus" aria-hidden="true"></i> Create Event
                                            </button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#eventForm").on("submit", function(event) {
                if (event.isDefaultPrevented()) {
                    $("#msgSubmit").removeClass("hidden").html(
                        "Form submission failed! Please check the errors.");
                } else {
                    event.preventDefault();
                    var form = $(this);
                    $.ajax({
                        url: "{{ route('store.event') }}",
                        type: "POST",
                        data: form.serialize(),
                        success: function(response) {
                            toastr.success('Event created successfully!')
                            // $("#msgSubmit").removeClass("hidden").html("Event created successfully!");
                            form.trigger("reset");
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            var errors = jqXHR.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                toastr.error(value);
                            });
                        }
                    });
                }
            });
        });
    </script>
@endpush
