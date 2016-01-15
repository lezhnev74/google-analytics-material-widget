<?php
if(!defined('CardsConst')) {
    die('Direct access not permitted');
}
?>

<div class="analytics_card card-condensed">
    <div class="row">
        <div class="col-xs-12">
            <div class="card {{$color or "blue-grey darken-1"}} hoverable">
                <div class="card-content white-text">


                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                            <div class="info-block">
                                <div class="icon-block"><img src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDY3IDc5LjE1Nzc0NywgMjAxNS8wMy8zMC0yMzo0MDo0MiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Q0M3MTFGOEVBRkFEMTFFNTg4RjBGRTAyMTQ0NjMzNEEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Q0M3MTFGOEZBRkFEMTFFNTg4RjBGRTAyMTQ0NjMzNEEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDQzcxMUY4Q0FGQUQxMUU1ODhGMEZFMDIxNDQ2MzM0QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpDQzcxMUY4REFGQUQxMUU1ODhGMEZFMDIxNDQ2MzM0QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pst1YwMAAA0+SURBVHja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"></div>
                                <div class="value-block">{{AnalyticsCard\Classes\Row::sumUsers($cities)}}</div>
                                <div class="subtitle-block">People visited</div>
                            </div>

                            <div class="info-block info-block-next">
                                <div class="icon-block"><img src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDY3IDc5LjE1Nzc0NywgMjAxNS8wMy8zMC0yMzo0MDo0MiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Q0M3MTFGOEFBRkFEMTFFNTg4RjBGRTAyMTQ0NjMzNEEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Q0M3MTFGOEJBRkFEMTFFNTg4RjBGRTAyMTQ0NjMzNEEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDQzcxMUY4OEFGQUQxMUU1ODhGMEZFMDIxNDQ2MzM0QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpDQzcxMUY4OUFGQUQxMUU1ODhGMEZFMDIxNDQ2MzM0QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PkV7jOIAAApeSURBVHja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"></div>
                                <div class="value-block">{{AnalyticsCard\Classes\Row::avgTimeOnPage($cities)}}</div>
                                <div class="subtitle-block">Avg time on page</div>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th data-field="id">City</th>
                                    <th data-field="name">Users</th>
                                    <th data-field="price">Avg time on page</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{$city->getTitle()}}</td>
                                        <td class="nwrp">{{$city->getUsers()}}</td>
                                        <td class="nwrp">{{$city->getAvgTimeOnPage()}}</td>
                                    </tr>
                                @endforeach
                                @if(!count($cities))
                                    <tr>
                                        <td colspan="3">No data</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>

                            <div class="report-days">@if(isset($days)) visitors for the last {{$days}} days @endif</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>