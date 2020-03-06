<!DOCTYPE html>
<html dir="ltr" lang="{{ app()->getLocale() }}" ng-app="app">
    <head>
        @include($theme.'-pkg::includes/common/theme-head')
        @include('helper-pkg::angular-js/css')
    </head>
    <body>
        <div ng-view></div>
        @include($theme.'-pkg::includes/common/theme-js')
        @include('helper-pkg::angular-js/js')
        @include('helper-pkg::setup')
        @include('uitoux-theme4-pkg::setup')

        <!-- Modal -->
        <div class="modal fade down-block" id="modal-loading" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-alert">
                            <div class="alert-item">
                                <div class="alert-details bg-green">
                                    <img src="{{asset('/public/themes/'.$theme.'/img/content/loading.svg')}}" class="img-responsive">
                                    <p>Please Wait...</p>
                                </div>
                            </div>
                        </div><!-- Modal Alert -->
                    </div><!-- Modal Body -->
                </div><!-- Modal Content -->
            </div><!-- Modal Dialog -->
        </div><!-- Modal Content -->

    </body>
</html>
