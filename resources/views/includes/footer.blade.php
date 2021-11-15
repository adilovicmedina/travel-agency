	<div style="background-color:#777; height: 200px;">
		@if (session()->has('success'))
		<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" style="text-align: center; color: white; padding-top: 20px; font-weight: 700;">
			<p>{{ session('success') }}</p>
		</div>
	@endif
	</div>
	
