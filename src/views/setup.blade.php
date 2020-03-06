@if(config('uitoux-theme4-pkg.DEV'))
    <?php $uitoux_theme4_pkg_prefix = '/packages/abs/uitoux-theme4-pkg/src';?>
@else
    <?php $uitoux_theme4_pkg_prefix = '';?>
@endif

<script type="text/javascript">
    var uitoux_theme4_home_template_url = "{{asset($uitoux_theme4_pkg_prefix.'/public/themes/'.$theme.'/elements/elements.html')}}";
</script>
<script type="text/javascript" src="{{asset($uitoux_theme4_pkg_prefix.'/public/themes/'.$theme.'/elements/controller.js')}}"></script>
