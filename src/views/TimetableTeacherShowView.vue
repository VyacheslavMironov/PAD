<template>
  <main class="container_fluid">
    <!-- Компонент сообщения -->
    <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
    <!-- END -->
    <div class="container">
      <div class="row">
        <div class="col-1 mb-5">
            <div class="mt-5"></div>
            <br>
            <ul class="time_for_block_table">
                <li>09:00</li>
                <li>10:40</li>
                <li>12:00</li>
                <li>13:00</li>
                <li>14:40</li>
                <li>16:00</li>
                <li>17:40</li>
                <li>19:00</li>
            </ul>
        </div>
        <div class="col-11 mb-5">
            <div class="col-12 mx-auto block-table-header pt-1em">
                <div class="d-flex">
                    <div class="block-table">
                        <p class="text-center">
                            <strong>Понедельник</strong>
                        </p>
                    </div>
                    <div class="block-table">
                        <p class="text-center">
                            <strong>Вторник</strong>
                        </p>
                    </div>
                    <div class="block-table">
                        <p class="text-center">
                            <strong>Среда</strong>
                        </p>
                    </div>
                    <div class="block-table">
                        <p class="text-center">
                            <strong>Четверг</strong>
                        </p>
                    </div>
                    <div class="block-table">
                        <p class="text-center">
                            <strong>Пятница</strong>
                        </p>
                    </div>
                    <div class="block-table">
                        <p class="text-center">
                            <strong>Суббота</strong>
                        </p>
                    </div>
                    <div class="block-table">
                        <p class="text-center">
                            <strong>Восскресенье</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 mx-auto block-table-body">
                <div class="d-flex"> <!-- 09.00-->
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 1"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '9:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '9:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 2"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '9:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '9:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 3"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '9:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '9:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 4"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '9:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '9:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 5"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '9:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '9:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 6"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '9:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '9:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 7"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '9:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '9:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                </div>
                <div class="d-flex"> <!-- 10.40-->
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 1"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '10:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '10:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 2"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '10:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '10:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 3"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '10:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '10:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 4"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '10:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '10:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 5"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '10:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '10:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 6"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '10:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '10:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 7"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '10:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '10:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                </div>
                <div class="d-flex"> <!-- 12.00-->
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 1"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '12:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '12:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 2"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '12:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '12:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 3"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '12:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '12:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 4"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '12:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '12:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 5"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '12:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '12:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 6"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '12:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '12:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 7"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '12:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '12:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                </div>
                <div class="d-flex"> <!-- 13.00-->
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 1"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '13:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '13:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 2"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '13:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '13:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 3"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '13:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '13:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 4"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '13:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '13:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 5"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '13:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '13:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 6"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '13:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '13:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 7"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '13:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '13:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                </div>
                <div class="d-flex"> <!-- 14.40-->
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 1"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '14:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '14:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 2"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '14:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '14:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 3"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '14:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '14:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 4"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '14:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '14:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 5"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '14:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '14:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 6"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '14:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '14:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 7"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '14:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '14:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                </div>
                <div class="d-flex"> <!-- 16.00-->
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 1"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '16:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '16:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 2"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '16:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '16:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 3"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '16:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '16:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 4"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '16:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '16:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 5"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '16:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '16:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 6"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '16:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '16:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 7"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '16:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '16:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                </div>
                <div class="d-flex"> <!-- 17.40-->
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 1"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '17:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '17:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 2"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '17:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '17:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 3"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '17:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '17:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 4"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '17:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '17:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 5"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '17:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '17:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 6"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '17:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '17:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 7"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '17:40' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '17:40'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                </div>
                <div class="d-flex"> <!-- 19.00-->
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 1"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '19:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '19:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 2"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '19:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '19:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 3"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '19:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '19:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 4"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '19:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '19:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 5"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '19:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '19:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 6"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '19:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '19:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <div class="block-table h-max">
                        <span
                            v-for="i in this.data"
                            v-bind:key="i"
                        >
                            <ul
                                v-if="i.day === 7"
                            >
                                <li
                                    v-for="x in i.list"
                                    v-bind:key="x"
                                    v-bind:class="x.time === '19:00' ? 'mt-2 list-timetable' : ''"
                                >
                                    <span
                                        v-if="x.time === '19:00'"
                                    >
                                        <b>{{ x.group }}</b> {{ x.lesson }}
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import axios from 'axios'
import AlertComponent from '@/components/AlertComponent.vue'

export default {
  data () {
    return {
      user_info: null,
      alert: '',
      url_get: this.$route.query,
      data: null
    }
  },
  props: {
    is_auth: Number,
    token: String
  },
  components: {
    AlertComponent
  },
  methods: {
    user: function () {
      if (this.is_auth >= 0) {
        axios.get('http://localhost:5000/api/user/user-info?access_token=' + this.token,
          {
            headers: {
              'Content-Type': 'application/json'
            }
          })
          .then((response) => {
            this.user_info = response.data[0].message
            // Вызывать методы использующие пользовательские данные ниже
            this.teacher_timetable(this.user_info.organization_id, this.url_get.user_id)
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    timetable_filter (list) {
      var arr = [
        { day: 1, list: [] },
        { day: 2, list: [] },
        { day: 3, list: [] },
        { day: 4, list: [] },
        { day: 5, list: [] },
        { day: 6, list: [] },
        { day: 7, list: [] }
      ]
      for (var i = 0; i < list.length; i++) {
        switch (list[i].day) {
          case 1:
            arr[i].list.push({
              lesson: list[i].lesson,
              group: list[i].group,
              time: list[i].time_start
            })
            break
          case 2:
            arr[i].list.push({
              lesson: list[i].lesson,
              group: list[i].group,
              time: list[i].time_start
            })
            break
          case 3:
            arr[i].list.push({
              lesson: list[i].lesson,
              group: list[i].group,
              time: list[i].time_start
            })
            break
          case 4:
            arr[i].list.push({
              lesson: list[i].lesson,
              group: list[i].group,
              time: list[i].time_start
            })
            break
          case 5:
            arr[i].list.push({
              lesson: list[i].lesson,
              group: list[i].group,
              time: list[i].time_start
            })
            break
          case 6:
            arr[i].list.push({
              lesson: list[i].lesson,
              group: list[i].group,
              time: list[i].time_start
            })
            break
          case 7:
            arr[i].list.push({
              lesson: list[i].lesson,
              group: list[i].group,
              time: list[i].time_start
            })
            break
        }
      }
      return arr
    },
    teacher_timetable: function (organizationId, userId) {
      axios.get('http://localhost:5000/api/timetable/show-teacher-timetable?organization_id=' + organizationId + '&&user_id=' + userId,
        {
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then((response) => {
          this.data = this.timetable_filter(response.data[0].message.list)
        })
        .catch(function (error) {
          console.log(error)
        })
    }
  },
  mounted () {
    this.user()
  }
}
</script>
