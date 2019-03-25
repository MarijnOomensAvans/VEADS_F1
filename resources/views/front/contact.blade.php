@extends('front.master')
@section('content')

    <div class="position-relative overflow-hidden width-100">
        <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Over ons</span>
    </div>

    <p>
        Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.
    </p>

    <div class="position-relative overflow-hidden width-100">
        <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Ons Team</span>
    </div>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <!-- start card 1 -->
                    <div class="col-md-4 col-sm-4 col-xs-12 padding-5px-all grid-item feature-box-4">
                        <div class="position-relative overflow-hidden border-radius-25">
                            <figure>
                                <img src="images/case-study-01.jpg" data-no-retina="">
                                <div class="opacity-medium bg-extra-dark-gray"></div>
                                <figcaption>
                                    <span class="text-extra-large display-block text-white alt-font margin-25px-bottom width-60 md-width-100 sm-width-100 sm-margin-seven-bottom xs-width-100">Veads</span>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <!-- end card 1 -->
                </div>
            </div>
        </div>
    </section>

    

    <div class="position-relative overflow-hidden width-100">
        <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Contactformulier</span>
    </div>

    <div class="block-content">
        <div class="row">
            <div class="col-12">
                <form method="post" action=""
                      enctype="multipart/form-data"><input type="hidden" name="_token"
                                                           value="">
                    <div class="form-group row"><label for="name" class="col-sm-4 col-lg-3 col-form-label">E-mail adres</label>
                        <div class="col-sm-8 col-lg-9"><input type="text" name="name" id="name" value=""
                                                              placeholder="example@gmail.com" class="form-control"></div>
                    </div>
                    <div class="form-group row mb-5"><label for="description" class="col-sm-4 col-lg-3 col-form-label">Vraag</label>
                        <div class="col-sm-8 col-lg-9"><textarea name="description" id="description" rows="15"
                                                                 placeholder="Vraag"
                                                                 class="form-control" style="display: none;"></textarea>
                            <div class="note-editor note-frame card">
                                <div class="note-dropzone">
                                    <div class="note-dropzone-message"></div>
                                </div>
                                <div class="note-toolbar card-header" role="toolbar"
                                     style="position: relative; top: 0px; width: 100%;">
                                    <div class="note-btn-group btn-group note-style">
                                        <button type="button" class="note-btn btn btn-light btn-sm note-btn-bold"
                                                role="button" tabindex="-1" title="" aria-label="Vet (CTRL+B)"
                                                data-original-title="Vet (CTRL+B)"><i class="note-icon-bold"></i>
                                        </button>
                                        <button type="button" class="note-btn btn btn-light btn-sm note-btn-italic"
                                                role="button" tabindex="-1" title="" aria-label="Cursief (CTRL+I)"
                                                data-original-title="Cursief (CTRL+I)"><i class="note-icon-italic"></i>
                                        </button>
                                        <button type="button" class="note-btn btn btn-light btn-sm note-btn-underline"
                                                role="button" tabindex="-1" title="" aria-label="Onderstrepen (CTRL+U)"
                                                data-original-title="Onderstrepen (CTRL+U)"><i
                                                    class="note-icon-underline"></i></button>
                                        <button type="button" class="note-btn btn btn-light btn-sm" role="button"
                                                tabindex="-1" title="" aria-label="Stijl verwijderen (CTRL+\)"
                                                data-original-title="Stijl verwijderen (CTRL+\)"><i
                                                    class="note-icon-eraser"></i></button>
                                    </div>
                                    <div class="note-btn-group btn-group note-fontsize">
                                        <div class="note-btn-group btn-group">
                                            <button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle"
                                                    role="button" tabindex="-1" data-toggle="dropdown" title=""
                                                    aria-label="Tekstgrootte" data-original-title="Tekstgrootte"><span
                                                        class="note-current-fontsize">16</span></button>
                                            <div class="dropdown-menu note-check dropdown-fontsize" role="list"
                                                 aria-label="Tekstgrootte"><a class="dropdown-item" href="#"
                                                                              data-value="8" role="listitem"
                                                                              aria-label="8"><i
                                                            class="note-icon-menu-check"></i> 8</a><a
                                                        class="dropdown-item" href="#" data-value="9" role="listitem"
                                                        aria-label="9"><i class="note-icon-menu-check"></i> 9</a><a
                                                        class="dropdown-item" href="#" data-value="10" role="listitem"
                                                        aria-label="10"><i class="note-icon-menu-check"></i> 10</a><a
                                                        class="dropdown-item" href="#" data-value="11" role="listitem"
                                                        aria-label="11"><i class="note-icon-menu-check"></i> 11</a><a
                                                        class="dropdown-item" href="#" data-value="12" role="listitem"
                                                        aria-label="12"><i class="note-icon-menu-check"></i> 12</a><a
                                                        class="dropdown-item" href="#" data-value="14" role="listitem"
                                                        aria-label="14"><i class="note-icon-menu-check"></i> 14</a><a
                                                        class="dropdown-item" href="#" data-value="18" role="listitem"
                                                        aria-label="18"><i class="note-icon-menu-check"></i> 18</a><a
                                                        class="dropdown-item" href="#" data-value="24" role="listitem"
                                                        aria-label="24"><i class="note-icon-menu-check"></i> 24</a><a
                                                        class="dropdown-item" href="#" data-value="36" role="listitem"
                                                        aria-label="36"><i class="note-icon-menu-check"></i> 36</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="note-btn-group btn-group note-para">
                                        <button type="button" class="note-btn btn btn-light btn-sm" role="button"
                                                tabindex="-1" title="" aria-label="Geordende lijst (CTRL+SHIFT+NUM8)"
                                                data-original-title="Geordende lijst (CTRL+SHIFT+NUM8)"><i
                                                    class="note-icon-orderedlist"></i></button>
                                        <button type="button" class="note-btn btn btn-light btn-sm" role="button"
                                                tabindex="-1" title="" aria-label="Ongeordende lijst (CTRL+SHIFT+NUM7)"
                                                data-original-title="Ongeordende lijst (CTRL+SHIFT+NUM7)"><i
                                                    class="note-icon-unorderedlist"></i></button>
                                    </div>
                                    <div class="note-btn-group btn-group note-misc">
                                        <button type="button" class="note-btn btn btn-light btn-sm" role="button"
                                                tabindex="-1" title="" aria-label="Ongedaan maken (CTRL+Z)"
                                                data-original-title="Ongedaan maken (CTRL+Z)"><i
                                                    class="note-icon-undo"></i></button>
                                        <button type="button" class="note-btn btn btn-light btn-sm" role="button"
                                                tabindex="-1" title="" aria-label="Opnieuw doorvoeren (CTRL+Y)"
                                                data-original-title="Opnieuw doorvoeren (CTRL+Y)"><i
                                                    class="note-icon-redo"></i></button>
                                    </div>
                                </div>
                                <div class="note-editing-area">
                                    <div class="note-placeholder" style="display: block;">Vraag</div>
                                    <div class="note-handle">
                                        <div class="note-control-selection">
                                            <div class="note-control-selection-bg"></div>
                                            <div class="note-control-holder note-control-nw"></div>
                                            <div class="note-control-holder note-control-ne"></div>
                                            <div class="note-control-holder note-control-sw"></div>
                                            <div class="note-control-sizing note-control-se"></div>
                                            <div class="note-control-selection-info"></div>
                                        </div>
                                    </div>
                                    <textarea class="note-codable" role="textbox" aria-multiline="true"></textarea>
                                    <div class="note-editable card-block" contenteditable="true" role="textbox"
                                         aria-multiline="true" style="height: 300px;"><p><br></p></div>
                                </div>
                                <output class="note-status-output" aria-live="polite"></output>
                                <div class="note-statusbar" role="status">
                                    <output class="note-status-output" aria-live="polite"></output>
                                    <div class="note-resizebar" role="seperator" aria-orientation="horizontal"
                                         aria-label="Resize">
                                        <div class="note-icon-bar"></div>
                                        <div class="note-icon-bar"></div>
                                        <div class="note-icon-bar"></div>
                                    </div>
                                </div>
                                <div class="modal link-dialog" aria-hidden="false" tabindex="-1" role="dialog"
                                     aria-label="Link invoegen">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header"><h4 class="modal-title">Link invoegen</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close" aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group note-form-group"><label class="note-form-label">Tekst
                                                        van link</label><input
                                                            class="note-link-text form-control note-form-control note-input"
                                                            type="text"></div>
                                                <div class="form-group note-form-group"><label class="note-form-label">Naar
                                                        welke URL moet deze link verwijzen?</label><input
                                                            class="note-link-url form-control note-form-control note-input"
                                                            type="text" value="http://"></div>
                                                <div class="form-check sn-checkbox-open-in-new-window"><label
                                                            class="form-check-label"> <input role="checkbox"
                                                                                             type="checkbox"
                                                                                             class="form-check-input"
                                                                                             checked=""
                                                                                             aria-label="Open in nieuw venster"
                                                                                             aria-checked="true"> Open
                                                        in nieuw venster</label></div>
                                            </div>
                                            <div class="modal-footer"><input type="button" href="#"
                                                                             class="btn btn-primary note-btn note-btn-primary note-link-btn"
                                                                             value="Link invoegen" disabled=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" aria-hidden="false" tabindex="-1" role="dialog"
                                     aria-label="Afbeelding invoegen">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header"><h4 class="modal-title">Afbeelding invoegen</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close" aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group note-form-group note-group-select-from-files">
                                                    <label class="note-form-label">Selecteer een bestand</label><input
                                                            class="note-image-input note-form-control note-input"
                                                            type="file" name="files" accept="image/*"
                                                            multiple="multiple"></div>
                                                <div class="form-group note-group-image-url" style="overflow:auto;">
                                                    <label class="note-form-label">URL van de afbeelding</label><input
                                                            class="note-image-url form-control note-form-control note-input  col-md-12"
                                                            type="text"></div>
                                            </div>
                                            <div class="modal-footer"><input type="button" href="#"
                                                                             class="btn btn-primary note-btn note-btn-primary note-image-btn"
                                                                             value="Afbeelding invoegen" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" aria-hidden="false" tabindex="-1" role="dialog"
                                     aria-label="Video invoegen">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header"><h4 class="modal-title">Video invoegen</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close" aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group note-form-group row-fluid"><label
                                                            class="note-form-label">URL van de video
                                                        <small class="text-muted">(YouTube, Vimeo, Vine, Instagram,
                                                            DailyMotion of Youku)
                                                        </small>
                                                    </label><input
                                                            class="note-video-url form-control note-form-control note-input"
                                                            type="text"></div>
                                            </div>
                                            <div class="modal-footer"><input type="button" href="#"
                                                                             class="btn btn-primary note-btn note-btn-primary note-video-btn"
                                                                             value="Video invoegen" disabled=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Help">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header"><h4 class="modal-title">Help</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close" aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body" style="max-height: 300px; overflow: scroll;">
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>ENTER</kbd></label><span>Alinea invoegen</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Z</kbd></label><span>Laatste handeling ongedaan maken</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Y</kbd></label><span>Laatste handeling opnieuw uitvoeren</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>TAB</kbd></label><span>Tab</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>SHIFT+TAB</kbd></label><span>Herstel tab</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+B</kbd></label><span>Stel stijl in als vet</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+I</kbd></label><span>Stel stijl in als cursief</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+U</kbd></label><span>Stel stijl in als onderstreept</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+S</kbd></label><span>Stel stijl in als doorgestreept</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+BACKSLASH</kbd></label><span>Verwijder stijl</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+L</kbd></label><span>Lijn links uit</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+E</kbd></label><span>Set center align</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+R</kbd></label><span>Lijn rechts uit</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+J</kbd></label><span>Lijn uit op volledige breedte</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM7</kbd></label><span>Zet ongeordende lijstweergave aan</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM8</kbd></label><span>Zet geordende lijstweergave aan</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+LEFTBRACKET</kbd></label><span>Verwijder inspringing huidige alinea</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+RIGHTBRACKET</kbd></label><span>Inspringen op huidige alinea</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM0</kbd></label><span>Wijzig formattering huidig blok in alinea(P tag)</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM1</kbd></label><span>Formatteer huidig blok als H1</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM2</kbd></label><span>Formatteer huidig blok als H2</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM3</kbd></label><span>Formatteer huidig blok als H3</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM4</kbd></label><span>Formatteer huidig blok als H4</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM5</kbd></label><span>Formatteer huidig blok als H5</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM6</kbd></label><span>Formatteer huidig blok als H6</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+ENTER</kbd></label><span>Invoegen horizontale lijn</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CTRL+K</kbd></label><span>Toon Link Dialoogvenster</span>
                                            </div>
                                            <div class="modal-footer"><p class="text-center"><a
                                                            href="http://summernote.org/" target="_blank">Summernote
                                                        0.8.11</a> · <a href="https://github.com/summernote/summernote"
                                                                        target="_blank">Project</a> · <a
                                                            href="https://github.com/summernote/summernote/issues"
                                                            target="_blank">Issues</a></p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 text-right"><a href=""
                                                          class="btn btn-secondary">Annuleren</a>
                            <button type="submit" class="btn btn-primary">Opsturen</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>