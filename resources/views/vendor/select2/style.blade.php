@push('css_style')
    <style>
        .select2-selection__rendered {
            line-height: 45px !important;
        }

        .select2-selection__arrow {
            height: 0px !important;
        }

        /* set height */
        .select2-container--bootstrap4 .select2-selection--single {
            height: calc(1.5em + 0.75rem + 13px) !important;
        }

        /* set line-height placeholder */
        .select2-container--bootstrap4 .select2-selection--single .select2-selection__placeholder {
            line-height: 45px;
            color: #574b90;
        }

        /* set clear btn */
        .select2-container--bootstrap4 .select2-selection__clear {
            margin-top: 1rem !important;
        }
    </style>
@endpush
