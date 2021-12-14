@extends('layouts.default')


@section('content')

            <div class="col-12">
                <div class="login-wrap">
                    <div class="login-content" style="margin-top: 50px; padding: 50px 100px;">
                        <div class="login-form" style="border: 1px solid black;">
                        <h2 style="padding-left: 20px; padding-top: 20px;">EDIT</h2>
                            <form method="POST" action="{{ route('reservations.update', ['user'=>$user->id, 'reservation'=>$reservation->id, 'tour'=>$tour->id]) }}" style="padding: 30px;">
                            	@csrf
                                <div class="form-group">
                                    <label>Number of adults</label>
                                    <input
                                    value="{{ $reservation->number_of_people }}"
                                    class="au-input au-input--full"
                                    type="number"
                                    name="number_of_people"
                                     placeholder="Number of people"
                                     id="number_of_people"
                                     value= "{{ old('number_of_people') }}" required>
                                    @error('number_of_people')
										<p>{{ $message }}</p>
									@enderror
                                </div>
                                <div class="form-group">
                                    <label>Number of children</label>
                                    <input
                                    value="{{ $reservation->number_of_children }}"
                                    class="au-input au-input--full"
                                    type="number"
                                    name="number_of_children"
                                    placeholder="Number of children"
                                    id="number_of_children"
                                    value= "{{ old('number_of_children') }}" required>
                                    @error('number_of_children')
										<p>{{ $message }}</p>
									@enderror
</div>

                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <a href="{{ route('reservations.index', Auth::id()) }}">Back</a>
                            </form>
                            <div class="register-link" style="padding: 30px;">
                                <p>
                                    @if (session()->has('success'))
									<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" style="text-align: center; color: white; padding-top: 20px; font-weight: 700;">
										<p>{{ session('success') }}</p>
									</div>
									@endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
