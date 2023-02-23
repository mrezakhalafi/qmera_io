let getById = (id, parent) => (parent ? parent.getElementById(id) : getById(id, document));
let getByClass = (className, parent) => (parent ? parent.getElementsByClassName(className) : getByClass(className, document));
let hex = "";
localStorage.destination = "";
localStorage.removeItem("complainID");

var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);

console.log("processing");

const DOM = {
	connectStatus: getById("connect-status"),
	personType: getById("person-type"),
	personInfo: getById("person-info"),
	statusText: getById("status-text"),
	chatListArea: getById("chat-list-area"),
	messageArea: getById("message-area"),
	inputArea: getById("input-area"),
	chatList: getById("chat-list"),
	chatListNavbar: getById("navbar", this.chatListArea),
	messages: getById("messages"),
	chatListItem: getByClass("chat-list-item"),
	messageAreaName: getById("name", this.messageArea),
	messageAreaPic: getById("pic", this.messageArea),
	messageAreaNavbar: getById("navbar", this.messageArea),
	messageAreaDetails: getById("details", this.messageAreaNavbar),
	messageAreaOverlay: getByClass("overlay", this.messageArea)[0],
	messageInput: getById("input"),
	openFileInput: getById("open-file"),
	fileInput: getById("file"),
	searchFriendDiv: getById("search-friend-div"),
	searchFriend: getById("search-friend"),
	searchFriendClear: getById("search-friend-clear"),
	// msgSearchOpen: getById("open-search"),
	// msgSearchFormGroup: getById("search-form-group"),
	// msgSearchInput: getById("search-msg"),
	// msgSearchClose: getById("close-search"),
	profileSettings: getById("profile-settings"),
	profilePic: getById("profile-pic"),
	profilePicInput: getById("profile-pic-input"),
	inputName: getById("input-name"),
	username: getById("username"),
	membersSection: getById("members-section"),
	displayPic: getById("display-pic"),
	friendList: getById("friend-list"),
	groupList: getById("group-list"),
	infoArea: getById("info-area"),
	personName: getById("person-name"),
	personLabel: getById("person-label"),
	personProfPic: getById("person-profile-pic"),
	personAbout: getById("person-about"),
	personGroup: getById("person-or-group-info"),
	documentPop: getById("document"),
	urlPreview: getById("urlPreview"),
	urlPreviewInner: getById("urlPreviewInner"),
	urlPreviewTitle: getById("website-title"),
	urlPreviewDesc: getById("website-description"),
	urlPreviewIcon: getById("website-icon"),
	removeMediaNotif: getById("RemoveMediaNotif"),
	replyPreview: getById("replyPreview"),
	removeReplyPreview: getById("RemoveReplyPreview"),
	blockUserButton: getById("block-user"),
	blockBar: getById("block-bar"),
	youBlocked: getById("you-blocked"),
	youAreBlocked: getById("you-are-blocked"),
	broadcastForm: getById("broadcast-form"),
	broadcastModalToggle: getById("broadcast-modal-toggle"),
	broadcastModal: getById("broadcast-modal"),
	broadcastTarget: getById("broadcast-target-audience"),
	formParticipants: getById("form-participants"),
	broadcastParticipants: getById("broadcast-participants"),
	formTargetGroup: getById("form-target-group"),
	broadcastGroup: getById("broadcast-target-group"),
	broadcastType: getById("broadcast-type"),
	broadcastMode: getById("broadcast-mode"),
	broadcastStartDate: getById("broadcast-start-date"),
	broadcastStartTime: getById("broadcast-start-time"),
	formEndDate: getById("form-end-date"),
	broadcastEndDate: getById("broadcast-end-date"),
	broadcastEndTime: getById("broadcast-end-time"),
	broadcastTitle: getById("broadcast-title"),
	broadcastMessage: getById("broadcast-msg"),
	broadcastFile: getById("broadcast-file"),
	broadcastLink: getById("broadcast-link"),
	broadcastSurvey: getById("broadcast-survey"),
	participantList: getById("participant-list"),
	participantListDropdown: getById("participant-dropdown"),
	targetGroupList: getById("target-group-list"),
	selectedParticipant: getById("selected-participant"),
	selectedGroup: getById("selected-group"),
	deleteParticipants: getById("delete-participants"),
	deleteGroups: getById("delete-groups"),
	submitBroadcast: getById("submit-broadcast"),
	closeBroadcast: getById("close-broadcast"),
	broadcastModalResult: getById("broadcast-modal-result"),
	complainModal: getById("complain-modal"),
	complainAcc: getById("complain-acc"),
	complainRej: getById("complain-rej"),
	finishComplain: getById("finish-complain"),
	deleteConversation: getById("delete-conversation"),
	openContactCenter: getById("open-cc"),
	ccStaff: getById("cc-staff"),
	ccCenter: getById("cc-center"),
	ccHistory: getById("cc-history"),
	complaintHistory: getById("complaint-history"),
	ccBar: getById("cc-bar"),
	ccConvo: getById("cc-convo"),
	openAttach: getById("open-attachment"),
	joinVC: getById("join-vc"),
	createVC: getById("create-vc"),
	vcRoomName: getById("vc-room-name"),
	callCCModal: getById("call-cc-modal"),
	callCCFpin: getById("call-cc-fpin"),
	callCCType: getById("call-cc-type"),
	callCCAcc: getById("call-cc-acc"),
	callCCRej: getById("call-cc-rej"),
	ccChannel: getById("cc-channel"),
	selectContactClose: getById("select-contact-close"),
	selectFriendFwd: getById("select-friend-fwd"),
	selectGroupFwd: getById("select-group-fwd"),
	searchFriendFwdDiv: getById("search-friend-fwd-div"),
	searchFriendFwd: getById("search-friend-fwd"),
	searchFriendFwdClear: getById("search-friend-fwd-clear"),
	friendTab: getById("friend-tab"),
	groupTab: getById("group-tab"),
	openSS: getById("open-ss"),
	ss_session: getById("ss-session"),
	ss_seminar: getById("ss-seminar"),
	ss_streaming: getById("ss-streaming"),
	addGroupMember: getById("add-group-member"),
	submitCreateGroup: getById("submit-create-group"),
	createGroupName: getById("create-group-name"),
	createGroupResult: getById("create-group-result"),
	createGroupResultText: getById("create-group-result-text"),
	saveGroupInfo: getById("save-group-info"),
	editGroupPic: getById("edit-group-pic"),
	selectMemberWrap: getById("select-member-wrap"),
	createTopicButton: getById("create-topic"),
	submitCreateTopic: getById("submit-create-topic"),
	createTopicName: getById("create-topic-name"),
	createTopicResult: getById("create-topic-result"),
	createTopicResultText: getById("create-topic-result-text"),
};

DOM.chatList.innerHTML = `
	<div class="chat-list-item d-flex flex-row w-100 p-4">
		<span class="mx-auto mt-3">Loading chat list...</span>
	</div>
	`;

let mClassList = (element) => {
	return {
		add: (className) => {
			element.classList.add(className);
			return mClassList(element);
		},
		remove: (className) => {
			element.classList.remove(className);
			return mClassList(element);
		},
		contains: (className, callback) => {
			if (element.classList.contains(className)) callback(mClassList(element));
		},
	};
};

// 'areaSwapped' is used to keep track of the swapping
// of the main area between chatListArea and messageArea
// in mobile-view
let areaSwapped = false;

// 'chat' is used to store the current chat
// which is being opened in the message area
let chat = null;

// this will contain all the chats that is to be viewed
// in the chatListArea
let chatList = [];

// this will be used to store the date of the last message
// in the message area
let lastDate = "";

let isOngoingCC = false;

// 'populateChatList' will generate the chat list
// based on the 'messages' in the datastore
let populateChatList = () => {
	chatList = [];
	// console.log("populate, reset chatlist arr");
	// 'present' will keep track of the chats
	// that are already included in chatList
	// in short, 'present' is a Map DS
	let present = {};

	MessageUtils.getMessages()
		.sort((a, b) => mDate(a.time).subtract(b.time))
		.forEach((msg) => {
			// if (msg.status > -1) {
			// console.log("mulai loop msg populate uc list");
			let chat = {};

			// chat.isGroup = msg.recvIsGroup;
			chat.isGroup = false;
			let isPrivate = contactList.some((grp) => grp.id === msg.recvId);

			if (!isPrivate) {
				if (groupList.some((group) => group.id === msg.recvId)) {
					chat.isGroup = true;
				}
			}

			chat.msg = msg;

			let isFriend = contactList.some((el) => el.id === msg.recvId || el.id === msg.sender);

			if (chat.isGroup) {
				// chat.group = groupList.find((group) => (group.id === msg.recvId));
				// chat.name = chat.group.name;

				chat.group = groupList.find((group) => group.id === msg.recvId);

				if (typeof chat.group === "undefined") {
					chat.group = topicList.find((topic) => topic.id === msg.recvId);
					chat.name = chat.group.title;
					chat.is_topic = true;
				} else {
					// chat.group = groupList.find((group) => (group.id === msg.recvId));
					// chat.name = chat.group.name;
					chat.name = chat.group.name;
					chat.is_topic = false;
				}
			} else {
				chat.contact = contactList.find((contact) => (msg.sender !== user.id ? contact.id === msg.sender : contact.id === msg.recvId));

				if (msg.is_complain == 1) {
					chat.name = chat.contact.name + " (Contact Center)";
					chat.is_complain = 1;
				} else {
					chat.name = chat.contact.name;
					chat.is_complain = 0;
				}
			}

			chat.unread = msg.sender !== user.id && msg.status < 4 && msg.status > -1 && msg.is_complain == 0 ? 1 : 0;

			// if (localStorage.destination == '' || (msg.sender !== user.id && msg.status < 4 && msg.is_complain == 0)) {
			// 	chat.unread = 1;
			// } else if (localStorage.destination == msg.sender) {
			// 	chat.unread = 0;
			// } else {
			// 	chat.unread = 0;
			// }

			if (typeof present[chat.name] !== "undefined") {
				chatList[present[chat.name]].msg = msg;
				chatList[present[chat.name]].unread += chat.unread;
			} else {
				present[chat.name] = chatList.length;
				chatList.push(chat);
				// console.log("populate, push chatlist");
			}
			// }
		});
};

let staff = [];

let viewChatList = () => {
	DOM.chatList.innerHTML = "";
	// console.log("sebelum loop chatlist");

	chatList
		.sort((a, b) => mDate(b.msg.time).subtract(a.msg.time))
		.forEach((elem, index) => {
			// let statusClass = elem.msg.status < 2 ? "far" : "fas";
			// console.log("mulai loop");
			let statusClass = "";

			if (elem.msg.is_deleted == 0) {
				if (elem.msg.status == 1 || elem.msg.status == 2) {
					statusClass = `<i class="fas fa-check"></i>`;
				} else if (elem.msg.status == 3) {
					statusClass = `<i class="fas fa-check-double"></i>`;
				} else if (elem.msg.status == 4) {
					statusClass = `<i class="fas fa-check-double" style="color: #6960EC;"></i>`;
				}
			}
			let unreadClass = elem.unread ? "unread" : "";

			let messagePreview = elem.msg.body;

			if (elem.msg.is_deleted == 1) {
				if (elem.msg.sender == user.id) {
					messagePreview = "<span style='font-style:italic;'><i class='fa fa-ban' aria-hidden='true'></i> You deleted this message.</span>";
				} else {
					messagePreview = "<span style='font-style:italic;'><i class='fa fa-ban' aria-hidden='true'></i> Message has been deleted.</span>";
				}
			} else {
				if (elem.msg.file == "image") {
					messagePreview = "Attach image";
				} else if (elem.msg.file == "video") {
					messagePreview = "Attach video";
				} else if (elem.msg.file == "audio") {
					messagePreview = "Attach audio";
				} else if (elem.msg.file == "file") {
					messagePreview = "Attach file";
				} else {
					messagePreview = richText(elem.msg.body.length <= 25 ? elem.msg.body : elem.msg.body.substr(0, 30) + "...");
				}
			}

			if (!elem.isGroup) {
				let badge = "";
				// staff.push(elem.contact.isStaff);
				if (elem.contact.id == localStorage.cc_alias_fpin) {
					// is company account
					badge = '<i class="fas fa-check-circle" style="color:#306EFF;"></i>';
				} else if (elem.contact.isStaff == "1") {
					badge = '<i class="fas fa-user"></i>';
				} else if (elem.contact.user_type == 23) {
					badge = '<i class="fas fa-check-circle" style="color:red;"></i>';
				}

				if (elem.is_complain == 1) {
					DOM.chatList.innerHTML += `
					<div id="${elem.contact.id}" class="chat-list-item d-none flex-row w-100 p-4 bg-lightgray border-bottom ${unreadClass}" onclick="generateMessageArea(this, ${index}, false, false)">
						<img src="${elem.isGroup ? elem.group.pic : elem.contact.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
						<div class="w-50 name-last-message">
							<div class="name">${badge} ${elem.name}</div>
							<div class="small last-message">${elem.isGroup ? contactList.find((contact) => contact.id === elem.msg.sender).name + ": " : ""}${
            elem.msg.sender === user.id ? statusClass : ""
          } <span style="pointer-events:none;">${messagePreview}</span></div>
						</div>
						<div class="flex-grow-1 text-right">
							<div class="small time">${mDate(elem.msg.time).chatListFormat()}</div>
							${elem.unread ? '<div class="badge badge-success badge-pill small" id="unread-count">' + elem.unread + "</div>" : ""}
						</div>
					</div>
					`;
				} else {
					if (elem.msg.hasOwnProperty("title")) {
						DOM.chatList.innerHTML += `
						<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom ${unreadClass}" onclick="generateMessageArea(this, ${index}, false, false)">
							<img src="${elem.isGroup ? elem.group.pic : elem.contact.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
							<div class="w-50 name-last-message">
								<div class="name">${badge} ${elem.name}</div>
								<div class="small last-message">${elem.isGroup ? contactList.find((contact) => contact.id === elem.msg.sender).name + ": " : ""}${elem.msg.sender === user.id ? statusClass : ""} <span style="pointer-events:none;">${richText(
              elem.msg.about
            )} - ${richText(elem.msg.title)}</span></div>
							</div>
							<div class="flex-grow-1 text-right">
								<div class="small time">${mDate(elem.msg.time).chatListFormat()}</div>
								${elem.unread ? '<div class="badge badge-success badge-pill small" id="unread-count">' + elem.unread + "</div>" : ""}
							</div>
						</div>
						`;
					} else {
						// // // console.log(badge);
						// console.log("masuk private chat");
						DOM.chatList.innerHTML += `
						<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom ${unreadClass}" onclick="generateMessageArea(this, ${index}, false, false)">
							<img src="${elem.isGroup ? elem.group.pic : elem.contact.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
							<div class="w-50 name-last-message">
								<div class="name">${badge} ${elem.name}</div>
								<div class="small last-message">${elem.isGroup ? contactList.find((contact) => contact.id === elem.msg.sender).name + ": " : ""}${
              elem.msg.sender === user.id ? statusClass : ""
            } <span style="pointer-events:none;">${messagePreview}</span></div>
							</div>
							<div class="flex-grow-1 text-right">
								<div class="small time">${mDate(elem.msg.time).chatListFormat()}</div>
								${elem.unread ? '<div class="badge badge-success badge-pill small" id="unread-count">' + elem.unread + "</div>" : ""}
							</div>
						</div>
						`;
					}
				}
			} else {
				/**
				 * if destination == chat_id -> custom topic
				 * if destination == group_id -> group lounge
				 */

				if (!elem.group.hasOwnProperty("group_id")) {
					// lounge

					DOM.chatList.innerHTML += `
						<div id="accordion-${elem.group.id}" style="width:100%;">
							<div class="card" style="background-color: #f7f7f7">
								<div class="card-header" id="group-${elem.group.id}">
									<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom collapsed ${unreadClass}" data-toggle="collapse" data-target="#topic-${elem.group.id}" aria-expanded="false" aria-controls="topic-${elem.group.id}">
										<img src="${elem.isGroup ? elem.group.pic : elem.contact.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
										<div class="w-50 name-last-message">
											<div class="name">${elem.name}</div>
											<div class="small last-message">${elem.group.quote != null ? elem.group.quote : ""}</div>
										</div>
										<div class="w-50 align-self-center">
											<i class="fas fa-chevron-up" style="float:right"></i>
										</div>
									</div>
								</div>
								<div id="topic-${elem.group.id}" class="collapse" aria-labelledby="group-${elem.group.id}" data-parent="#accordion-${elem.group.id}">
									<div class="card-body">
										<div id="${elem.group.id}" class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom ${unreadClass}" onclick="generateMessageArea(this, ${index}, false, true)">
											<div style="height:50px; width:50px;"></div>
											<div class="w-50 align-self-center">
												<div class="name">Lounge</div>
												<div class="small last-message">${
                          elem.isGroup
                            ? (groupMembers.some((el) => el.f_pin === elem.msg.sender && el.group_id === elem.msg.recvId)
                                ? elem.msg.sender == user.id
                                  ? "You"
                                  : groupMembers.find((el) => el.f_pin === elem.msg.sender && el.group_id === elem.msg.recvId).name
                                : "member") + ": "
                            : ""
                        }${elem.msg.sender === user.id ? statusClass : ""} <span style="pointer-events:none;">${messagePreview}</span></div>
											</div>
											<div class="flex-grow-1 text-right">
												<div class="small time">${mDate(elem.msg.time).chatListFormat()}</div>
												${elem.unread ? '<div class="badge badge-success badge-pill small" id="unread-count">' + elem.unread + "</div>" : ""}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						`;
				} else {
					// custom topic
					let htmlContent = `<div id="${elem.group.id}" class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom ${unreadClass}" onclick="generateMessageArea(this, ${index}, false, true)">
							<div style="height:50px; width:50px;"></div>
							<div class="w-50 align-self-center">
								<div class="name">${elem.name}</div>
								<div class="small last-message">${elem.isGroup ? contactList.find((contact) => contact.id === elem.msg.sender).name + ": " : ""}${
            elem.msg.sender === user.id ? statusClass : ""
          } <span style="pointer-events:none;">${messagePreview}</span></div>
							</div>
							<div class="flex-grow-1 text-right">
								<div class="small time">${mDate(elem.msg.time).chatListFormat()}</div>
								${elem.unread ? '<div class="badge badge-success badge-pill small" id="unread-count">' + elem.unread + "</div>" : ""}
							</div>
						</div>`;

					setTimeout(function () {
						document
							.getElementById("topic-" + elem.group.group_id)
							.getElementsByClassName("card-body")[0]
							.insertAdjacentHTML("beforeend", htmlContent);
					}, 100);
				}
			}
		});

	// console.log("sesudah loop chatlist");
};

let generateChatList = () => {
	// // console.log("genchatlist periodic");
	// console.log("kenapa gak jalan");
	appendUserType();
	// populateChatList();
	// viewChatList();
};

let richText = (content) => {
	let cont = content
		.replace(/\*([^\*]+)\*/g, "<strong>$1</strong>")
		.replace(/\^([^\^]+)\^/g, "<u>$1</u>")
		.replace(/\_([^\_]+)\_/g, "<i>$1</i>")
		.replace(/\~([^\~]+)\~/g, "<del>$1</del>")
		.replace(/[\n\r]+/g, "<br>");
	return cont;
};

let addDateToMessageArea = (date) => {
	let dateParts = date.split("/");
	let dateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]);

	let day = dateObject.getDate();
	let month = dateObject.toLocaleString('default', {
		month: 'long'
	});
	let year = dateObject.getFullYear();

	DOM.messages.innerHTML += `
	<div class="mx-auto my-2 py-1 px-2" style="font-size: 10px; color: #7f7f7f;">
		${day} ${month} ${year}
	</div>
	`;
};

let storeBase64 = "";

let msgFwd = {};

let fwdDestination = (msgId) => {
	msgFwd = messages.find((el) => el.id === msgId);
	mClassList(DOM.searchFriendFwdDiv).remove("d-none");
	let friendNames = [];
	contactList.forEach((elem) => {
		if (elem.id != "-999" && elem.id != user.id) {
			friendNames.push(elem.name.trim());
		}
	});
	$("#search-friend-fwd").autocomplete({
		source: friendNames,
		appendTo: "#search-friend-fwd-div",
	});
	fillFriendFwdList();
};

DOM.friendTab.addEventListener("click", () => {
	mClassList(DOM.searchFriendFwdDiv).remove("d-none");
	fillFriendFwdList();
});

DOM.groupTab.addEventListener("click", () => {
	mClassList(DOM.searchFriendFwdDiv).add("d-none");
	fillGroupFwdList();
});

let fwdMessage = (dest) => {
	let msg_id = localStorage.F_PIN + Date.now().toString();

	let destIsGroup = groupList.some((el) => el.id === dest);
	let destIsTopic = topicList.some((el) => el.id === dest);

	msgFwd.id = msg_id;
	msgFwd.sender = user.id;
	msgFwd.time = mDate().toString();
	msgFwd.status = 1;
	msgFwd.recvId = dest;
	msgFwd.recvIsGroup = destIsGroup || destIsTopic;
	delete msgFwd.reply_to;

	// // console.log(msgFwd);

	// msgFwd = {
	// 	id: msg_id,
	// 	sender: localStorage.F_PIN,
	// 	body: content,
	// 	file_id: fileId,
	// 	time: mDate().toString(),
	// 	status: 1,
	// 	recvId: chat.isGroup ? chat.group.id : chat.contact.id,
	// 	recvIsGroup: chat.isGroup,
	// 	file: filetype,
	// 	is_complain: chat.is_complain
	// };

	let scope = "3";
	let chat_id = "";
	let destination = dest;

	if (msgFwd.recvIsGroup) {
		scope = "4";

		if (destIsTopic) {
			chat_id = dest;
			destination = topicList.find((el) => el.id === dest).group_id;
		}
	}

	if (user.isOnline === 1) {
		setTimeout(addMessageToMessageArea(msgFwd), 500);
		MessageUtils.addMessage(msgFwd);
		generateChatList();
		tempBase64 = "";

		// message form data
		var formData = new FormData();
		formData.append("message_id", msg_id);
		formData.append("destination", destination);
		formData.append("originator", user.id);
		formData.append("sent_time", Date.now());
		formData.append("content", msgFwd.body);

		formData.append("scope", scope);
		formData.append("chat_id", chat_id);
		formData.append("is_chrome", isChrome);
		formData.append("flag", localStorage.FLAG);

		if (msgFwd.is_complain) {
			formData.append("is_complaint", "1");
			formData.append("call_center_id", localStorage.getItem("complainID"));
		}

		if (msgFwd.file != "") {
			if (msgFwd.file == "image") {
				formData.append("image_id", msgFwd.file_id);
				let thumb_id = msgFwd.file_id.split(".")[0];
				formData.append("thumb_id", thumb_id + ".jpg");
			} else if (msgFwd.file == "audio") {
				formData.append("audio_id", msgFwd.file_id);
				formData.append("content", msgFwd.file_id + "|" + msgFwd.body);
			} else if (msgFwd.file == "video") {
				formData.append("video_id", msgFwd.file_id);
				let thumb_id = msgFwd.file_id.split(".")[0];
				formData.append("thumb_id", thumb_id + ".jpg");
			} else if (msgFwd.file == "file") {
				formData.append("file_id", msgFwd.file_id);
				formData.append("content", msgFwd.file_id + "|" + msgFwd.body);
			}
		}

		$("#select-contact-fwd").modal("toggle");

		var xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				// console.log(xmlHttp.responseText);
			}
		};
		xmlHttp.open("post", "/chatcore/logics/digisales/send_file");
		xmlHttp.send(formData);

		msgFwd = {};
	} else {
		alert("You are currently offline. Please make sure your catchUp is online.");
	}
};

let fillFriendFwdList = () => {
	DOM.selectFriendFwd.innerHTML = "";
	contactList
		.sort((a, b) => {
			let fa = a.name.toLowerCase();
			let fb = b.name.toLowerCase();

			if (fa < fb) {
				return -1;
			}
			if (fa > fb) {
				return 1;
			}
			return 0;
		})
		.forEach((elem, index) => {
			if (elem.id !== localStorage.F_PIN && elem.id != "-999") {
				// exclude self from friend list view, for arr = friend list
				let badge = "";
				if (elem.id == localStorage.cc_alias_fpin) {
					// is company account
					badge = '<i class="fas fa-check-circle" style="color:#306EFF;"></i>';
				} else if (elem.isStaff == "1") {
					badge = '<i class="fas fa-user"></i>';
				} else if (elem.user_type == 23) {
					badge = '<i class="fas fa-check-circle" style="color:red;"></i>';
				}
				DOM.selectFriendFwd.innerHTML += `
		<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom" ${elem.id === localStorage.cc_alias_fpin ? 'id="alias-' + elem.id + '"' : ""}  onclick="generateMessageArea(this, '${elem.id}', true, false); fwdMessage('${elem.id}')">
			<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
			<div class="w-50">
				<div class="name">${badge} ${elem.name}</div>
			</div>
		</div>
		`;
			}
		});
};

let fillGroupFwdList = () => {
	DOM.selectGroupFwd.innerHTML = "";
	groupList
		.sort((a, b) => {
			let fa = a.id.toLowerCase();
			let fb = b.id.toLowerCase();

			if (fa < fb) {
				return -1;
			}
			if (fa > fb) {
				return 1;
			}
			return 0;
		})
		.forEach((elem, index) => {
			if (elem.parent === "") {
				DOM.selectGroupFwd.innerHTML += `
				<div id="accordion-groupList-fwd-${elem.id}" style="width:100%;">
					<div class="card" style="background-color: #f7f7f7">
						<div class="card-header" id="groupList-fwd-${elem.id}">
							<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom collapsed" data-toggle="collapse" data-target="#topic-groupList-fwd-${elem.id}" aria-expanded="false" aria-controls="topic-groupList-${elem.id}">
								<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
								<div class="w-50 align-self-center">
									<div class="name">${elem.name}</div>
								</div>
								<div class="w-50 align-self-center">
									<i class="fas fa-chevron-up" style="float:right"></i>
								</div>
							</div>
						</div>
						<div id="topic-groupList-fwd-${elem.id}" class="collapse" aria-labelledby="groupList-fwd-${elem.id}" data-parent="#accordion-groupList-fwd-${elem.id}">
							<div class="card-body">
								<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom" onclick="generateMessageArea(this, '${elem.id}', true, true); fwdMessage('${elem.id}')">
									<img src="/chatcore/assets/img/forum.png" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
									<div class="w-50 align-self-center">
										<div class="name">Lounge</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				`;
			} else {
				// // console.log(elem);
				let htmlContent = `
				<div id="accordion-groupList-fwd-${elem.id}" style="width:100%;">
					<div class="card" style="background-color: #f7f7f7">
						<div class="card-header" id="groupList-fwd-${elem.id}">
							<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom collapsed" data-toggle="collapse" data-target="#topic-groupList-fwd-${elem.id}" aria-expanded="false" aria-controls="topic-groupList-${elem.id}">
								<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
								<div class="w-50 align-self-center">
									<div class="name">${elem.name}</div>
								</div>
								<div class="w-50 align-self-center">
									<i class="fas fa-chevron-up" style="float:right"></i>
								</div>
							</div>
						</div>
						<div id="topic-groupList-fwd-${elem.id}" class="collapse" aria-labelledby="groupList-fwd-${elem.id}" data-parent="#accordion-groupList-fwd-${elem.id}">
							<div class="card-body">
								<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom" onclick="generateMessageArea(this, '${elem.id}', true, true); fwdMessage('${elem.id}')">
									<img src="/chatcore/assets/img/forum.png" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
									<div class="w-50 align-self-center">
										<div class="name">Lounge</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				`;

				setTimeout(function () {
					document
						.getElementById("topic-groupList-fwd-" + elem.parent)
						.getElementsByClassName("card-body")[0]
						.insertAdjacentHTML("beforeend", htmlContent);
				}, 100);
			}

			let isTopicExist = topicList.filter((topic) => topic.group_id === elem.id);

			if (isTopicExist.length > 0) {
				isTopicExist
					.sort((a, b) => {
						let fa = a.name.toLowerCase();
						let fb = b.name.toLowerCase();

						if (fa < fb) {
							return -1;
						}
						if (fa > fb) {
							return 1;
						}
						return 0;
					})
					.forEach((elem, index) => {
						let htmlContent = `<div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" onclick="generateMessageArea(this, '${elem.id}', true, true); fwdMessage('${elem.id}')">
							<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
							<div class="w-50 align-self-center">
								<div class="name">${elem.title}</div>
							</div>
						</div>`;

						setTimeout(function () {
							document
								.getElementById("topic-groupList-fwd-" + elem.group_id)
								.getElementsByClassName("card-body")[0]
								.insertAdjacentHTML("beforeend", htmlContent);
						}, 100);
					});
			}
		});
};

DOM.selectContactClose.addEventListener("click", () => {
	msgFwd = {};
	// console.log(msgFwd);
});

let deleteMsg = (msgId) => {
	if (confirm("Delete Message?")) {
		let fd = new FormData();

		let singleQuoteMsg = "'" + msgId + "'";

		fd.append("message_id", singleQuoteMsg);
		fd.append("from", user.id);
		fd.append("flag", localStorage.FLAG);

		if (!chat.isGroup) {
			fd.append("to", chat.contact.id);
			fd.append("scope", "3");
			fd.append("chat_id", "");
		} else {
			if (chat.is_topic) {
				fd.append("chat_id", chat.group.id);
				fd.append("to", chat.group.group_id);
			} else {
				fd.append("chat_id", "");
				fd.append("to", chat.group.id);
			}
			fd.append("scope", "4");
		}

		let xhr = new XMLHttpRequest();
		let url = "/chatcore/logics/delete_message";
		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4 && xhr.status == 200) {
				// xhr.log(xhr.responseText);
				// location.reload();
				// document.getElementById('msg-' + msgId).getElementsByClassName('body')[1].innerHTML = "<span style='font-style:italic;'><i class='fa fa-ban' aria-hidden='true'></i> You deleted this message.</span>";
				let hasReply = messages.find((el) => el.id == msgId).reply_to != null;
				if (hasReply) {
					document.getElementById("msg-" + msgId).getElementsByClassName("body")[1].innerHTML = "<span style='font-style:italic;'><i class='fa fa-ban' aria-hidden='true'></i> You deleted this message.</span>";
					$("#msg-" + msgId + " .time > i").remove();
					$("#msg-" + msgId + " .reply-body").remove();
				} else {
					document.getElementById("msg-" + msgId).getElementsByClassName("body")[0].innerHTML = "<span style='font-style:italic;'><i class='fa fa-ban' aria-hidden='true'></i> You deleted this message.</span>";
					$("#msg-" + msgId + " .time > i").remove();
				}
				// let msgReplied = messages.find(el => el.reply_to == msgId);
				// if (typeof msgReplied != "undefined") {

				// }
				$("#msg-" + msgId + " .options").hide();
				let msgIndex = messages.findIndex((el) => el.id == msgId);
				messages[msgIndex].is_deleted = 1;
				generateChatList();
			}
		};
		xhr.open("post", url);
		xhr.send(fd);
	} else {
		return;
	}
};

let openImageNewTab = (base64) => {
	$("#image-preview").modal("show");

	$("#image-preview .modal-body").empty();

	let imgPrv = document.createElement("img");
	imgPrv.src = base64;
	imgPrv.style.height = "500px";
	imgPrv.style.width = "auto";

	$("#image-preview .modal-body").append(imgPrv);
};

let joinVCR = (by, createOrJoin) => {
	let formData = new FormData();

	formData.append("f_pin", by);

	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// console.log(xmlHttp.responseText);

			let data = JSON.parse(xmlHttp.responseText);

			let roomName = data.VC_ROOM_ID;
			let joinCommand = "";

			if (createOrJoin == "join") {
				joinCommand = "palio:" + localStorage.getItem("api_key") + "+" + user.id + "+vjr+" + roomName;
			} else if (createOrJoin == "create") {
				joinCommand = "palio:" + localStorage.getItem("api_key") + "+" + user.id + "+vcr+" + roomName;
			}

			checkCustomProtocol(joinCommand, 200);
		}
	};
	xmlHttp.open("post", "/chatcore/logics/fetch_vc_room");
	xmlHttp.send(formData);
};

let addMessageToMessageArea = (msg) => {
	let msgDate = mDate(msg.time).getDate();
	if (lastDate != msgDate) {
		addDateToMessageArea(msgDate);
		lastDate = msgDate;
	}

	if (msg.hasOwnProperty("title")) {
		var title = msg.title;
		var desc = msg.description;
		var start = msg.broadcaster;
		var broadcaster = contactList.find((el) => el.id === msg.broadcaster).name.trim();
		var broadcaster_fpin = msg.broadcaster;
		var description = msg.description;
		var tagline = msg.tagline;
		var kind = "Seminar";
		var kindImage = "<img src='../../assets/img/seminar.png' style='height:100px; width: auto;'>";
		if (tagline != "" && description != "") {
			kind = "Live Video Promotion";
			kindImage = "<img src='../../assets/img/promotion.png' style='height:100px; width: auto;'>";
		} else if (description == null) {
			kind = "Video Conference Room";
			kindImage = "<img src='../../assets/img/vcr.png' style='height:100px; width: auto;'>";
		}
	}

	let htmlForGroup = "";

	if (chat.isGroup) {
		htmlForGroup = `
		<div style="cursor: pointer;" onclick="contactInfo('${groupMembers.find((el) => el.f_pin === msg.sender).f_pin}');" class="small font-weight-bold text-primary group-username">
			${msg.sender == user.id ? user.name.trim() : groupMembers.find((el) => el.f_pin === msg.sender).name.trim()}
		</div>
		`;
	}

	let reply_text = "";

	if (msg.reply_to != null && msg.is_deleted == 0) {
		replied_msg = messages.find((el) => el.id === msg.reply_to);
		if (replied_msg != undefined && replied_msg.is_deleted != 1) {
			// replied_msg_originator = contactList.find(el => el.id === replied_msg.sender );
			let isInContactList = contactList.some((el) => el.id === replied_msg.sender);
			let replied_msg_originator = "";
			if (replied_msg.sender == user.id) {
				replied_msg_originator = "You";
			} else {
				if (isInContactList) {
					replied_msg_originator = contactList.find((el) => el.id === replied_msg.sender).name;
				} else {
					replied_msg_originator = $("#msg-" + replied_msg.id + " .small.text-primary.group-username").html();
					// temp_sender_name = friend;
				}
			}
			if (replied_msg.body == "") {
				reply_text = `
				<span class="reply-body" onclick="highlightChat('msg-${msg.reply_to}')" style="cursor:pointer;">
				<div class="d-flex flex-row" style="background-color:${msg.sender == user.id ? "white" : "#dcf8c6"};">
					<div class="body m-1 mr-2"><small><strong>${replied_msg.sender == user.id ? "You" : replied_msg_originator}</strong> : ${replied_msg.file_id}</small></div>
				</div>
				</span>`;
			} else {
				reply_text = `
				<span class="reply-body" onclick="highlightChat('msg-${msg.reply_to}')" style="cursor:pointer;">
				<div class="d-flex flex-row" style="background-color:${msg.sender == user.id ? "white" : "#dcf8c6"};">
					<div class="body m-1 mr-2"><small><strong>${replied_msg.sender == user.id ? "You" : replied_msg_originator}</strong> : ${replied_msg.body}</small></div>
				</div>
				</span>`;
			}
		} else {
			// ${messages.find(el => msg.reply_to == el.id).sender == user.id ? "You deleted this message" : "This message has been deleted."}
			reply_text = `
			<span class="reply-body" onclick="highlightChat('msg-${msg.reply_to}')" style="cursor:pointer;">
			<div class="d-flex flex-row" style="background-color:${msg.sender == user.id ? "white" : "#dcf8c6"};">
				<div class="body m-1 mr-2"><small><i><i class="fa fa-ban" aria-hidden="true"></i> This message has been deleted.</i></small></div>
			</div>
			</span>`;
		}
	}

	// if (msg.sender === user.id && msg.reply_to != null){
	// 	var reply_bubble = 'style="background: linear-gradient(to bottom, white 50%, #dcf8c6 50%) !important;"';
	// } else if (msg.reply_to != null) {
	// 	var reply_bubble = 'style="background: linear-gradient(to bottom, #dcf8c6 50%, white 50%) !important;"';
	// }

	let urlRegex = new RegExp("([a-zA-Z0-9]+://)?([a-zA-Z0-9_]+:[a-zA-Z0-9_]+@)?([a-zA-Z0-9.-]+\\.[A-Za-z]{2,4})(:[0-9]+)?([^ ])+");

	// let sendStatus = `<i class="${msg.status < 2 ? "far" : "fas"} fa-check-circle"></i>`;
	let sendStatus = "";

	if (msg.is_deleted == 0) {
		if (msg.status <= 2) {
			sendStatus = `<i class="fas fa-check"></i>`;
		} else if (msg.status == 3) {
			sendStatus = `<i class="fas fa-check-double"></i>`;
		} else if (msg.status == 4) {
			sendStatus = `<i class="fas fa-check-double" style="color: #6960EC;"></i>`;
		}
	}

	// var root = "https://qmera.io";
	var root = location.protocol + '//' + location.host;

	let msgBody = "";
	let msgText = richText(msg.body);
	if (msg.complainID == "CMP_687031752596890") {
		console.log("check out");
		console.log(msg.body);
		console.log(msgText);
	}

	// check message content

	if (msg.file == "image") {
		// msgBody = '<div class="flex-grow-1"><img src="../../assets/img/thumb_image.png" width="100" height="100"><span>' + msg.body + '</span></div>';
		if (tempBase64 !== "") {
			// msgBody = "<a href=\'" + tempBase64 + "\' target=\'_blank\'><img src=\'" + tempBase64 + "\' style=\'width:250px; height:auto;\'></a>";
			msgBody = `<img src="${tempBase64}" style="width:250px; height:auto; cursor:pointer;" onclick="openImageNewTab('${tempBase64}')">`;
		} else {
			// msgBody = "<a href=\'" + root + dir + msg.file_id + "\' target=\'_blank\'><img src=\'" + root + dir + msg.file_id + "\' style=\'width:250px; height:auto;\'></a>";
			msgBody = `<img src="${root + dir + msg.file_id}" style="width:250px; height:auto; cursor:pointer;" onclick="openImageNewTab('${root + dir + msg.file_id}')">`;
		}
	} else if (msg.file == "video") {
		// msgBody = '<div class="flex-grow-1"><img src="../../assets/img/thumb_video.png" width="100" height="100"><span>' + msg.body + '</span></div>';
		msgBody = `
				<video controls width="250">
					<source src='${root + dir + msg.file_id}'>
					Sorry, your browser doesn't support embedded videos.
				</video>
			`;
	} else if (msg.file == "audio") {
		// msgBody = '<a href="' + msg.file_id + '"><div class="flex-grow-1"><img src="../../assets/img/thumb_audio.png" width="100" height="100"><span>' + msg.file_id + '</span></div></a>';
		msgBody = '<div class="flex-grow-1"><img src="../../assets/img/thumb_audio.png" width="100" height="100"><span><a href="' + root + dir + msg.file_id + '" target="_blank">' + msg.file_id + "</a></span></div>";
		msgText = richText(msg.body);
	} else if (msg.file == "file") {
		// msgBody = '<a href="' + msg.file_id + '"><div class="flex-grow-1"><img src="../../assets/img/thumb_document.png" width="100" height="100"><span>' + msg.file_id + '</span></div></a>';
		msgBody = '<div class="flex-grow-1"><img src="../../assets/img/thumb_document.png" width="100" height="100"><span><a href="' + root + dir + msg.file_id + '" target="_blank">' + msg.file_id + "</a></span></div>";
		msgText = richText(msg.body);
	} else {
		msgText = richText(msg.body);
	}

	if (urlRegex.test(msgText)) {
		// contains url

		let matchingRegex = msg.body.match(urlRegex)[0];
		let correctedRegex = matchingRegex;
		if (!matchingRegex.includes("https://") && !matchingRegex.includes("http://")) {
			correctedRegex = "https://" + matchingRegex;
		} else if (matchingRegex.includes("http://")) {
			correctedRegex = matchingRegex;
		}
		msgText = richText(msg.body.replace(matchingRegex, "<a href=" + correctedRegex + ' target="_blank">' + matchingRegex + "</a>"));
		// msgText = `
		// 	<a href="` + msgText.match(urlRegex)[0] + `" target="_blank">
		// 		<div class="flex-grow-1">
		// 			<div class="row m-2">
		// 				<div class="col-sm-4 align-self-center text-center">
		// 					<img id="msg-url-icon-` + msg.id + `" class="mx-auto" style="height:auto; max-width:100%;">
		// 				</div>
		// 				<div class="col-sm-8 align-self-center">
		// 					<h5 id="msg-url-title-` + msg.id + `"></h5>
		// 					<p id="msg-url-desc-` + msg.id + `" style="font-size:14px;"></p>
		// 				</div>
		// 			</div>
		// 		</div>
		// 	</a>
		// 	` + richText(msg.body.replace(msg.body.match(urlRegex)[0], "<a href=" + msg.body.match(urlRegex)[0] + " target=\"_blank\">" + msg.body.match(urlRegex)[0] + "</a>")) + `
		// `;

		// let contentUrl = msg.body.match(urlRegex)[0];

		// // open xhr
		// let xmlHttp = new XMLHttpRequest();
		// xmlHttp.onreadystatechange = function () {
		// 	if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
		// 		// // // console.log(xmlHttp.responseText);

		// 		let img = $(xmlHttp.responseText).filter('meta[property="og:image"]').attr("content");
		// 		if (typeof img === 'undefined') {
		// 			img = '../../assets/img/document.png';
		// 		}
		// 		let title = $(xmlHttp.responseText).filter('title').text();
		// 		let description = $(xmlHttp.responseText)
		// 			.filter('meta[property="og:description"],meta[name="description"],meta[name="twitter:description"],meta[itemprop="description"]').attr("content");

		// 		document.getElementById('msg-url-icon-' + msg.id).src = img;
		// 		document.getElementById('msg-url-title-' + msg.id).innerHTML = title;
		// 		document.getElementById('msg-url-desc-' + msg.id).innerHTML = description.substr(0, 50) + '...';
		// 	}
		// }

		// xmlHttp.open("get", "https://cors.bridged.cc/" + contentUrl);
		// xmlHttp.send();
	}

	if (msg.is_deleted == 1) {
		msgBody = "";
		if (msg.sender != user.id) {
			msgText = "<span style='font-style:italic;'><i class='fa fa-ban' aria-hidden='true'></i> Message has been deleted.</span>";
		} else {
			msgText = "<span style='font-style:italic;'><i class='fa fa-ban' aria-hidden='true'></i> You deleted this message.</span>";
		}
	}

	if (document.getElementById("msg-" + msg.id) == null) {
		if (chat.is_complain == 1) {
			if (msg.is_complain == 1) {
				DOM.messages.innerHTML += `
				<div class="align-self-${msg.sender === user.id ? "end self" : "start"} p-1 my-1 mx-3 bg-white message-item" id="msg-${msg.id.toString()}">
					<div class="options dropdown">
						<a href="#" class="${msg.is_deleted === 1 ? "d-none" : ""} dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
							<i class="fas fa-angle-down text-muted px-2"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item ${isShowingComplaintHistory ? "d-none" : ""}" onclick="replyMessage('${msg.id}')" href="#">Reply</a>
							<a class="dropdown-item" href="#" onclick="fwdDestination('${msg.id}')" data-toggle="modal" data-target="#select-contact-fwd">Forward</a>
							<a class="dropdown-item ${msg.sender === user.id ? "" : "d-none"}" href="#" onclick="deleteMsg('${msg.id}')">Delete</a>
						</div>
					</div>
					${msg.reply_to != null ? reply_text : ""}
					${chat.isGroup ? htmlForGroup : ""}
					<div class="d-flex flex-row px-3 py-3 ${msg.sender === user.id ? "bg-purple" : "bg-lightgray"}" style="border-radius: 10px;">
						<div class="body m-1 mr-2" style="font-size: 14px;">${msgBody != "" ? msgBody + "<br>" : ""}${msgText}</div>
					</div>
					<div class="time ml-auto text-right flex-shrink-0 align-self-end text-muted" style="width:75px; font-size: 10px;">
						${mDate(msg.time).getTime()}
						${msg.sender === user.id ? sendStatus : ""}
					</div>
				</div>
				`;
			}
		} else {
			if (msg.is_complain === 0 || msg.is_complain === undefined) {
				if (msg.hasOwnProperty("title")) {
					var linkVCR = "";
					if (broadcaster_fpin == user.id) {
						// var linkVCR = 'palio:' + localStorage.getItem('api_key') + '+' + user.id + '+vcr+' + msg.title;
						linkVCR = "onclick='joinVCR(\"" + broadcaster_fpin + "\", \"create\")'";
					} else {
						// var linkVCR = 'palio:' + localStorage.getItem('api_key') + '+' + user.id + '+vjr+' + msg.title;
						linkVCR = "onclick='joinVCR(\"" + broadcaster_fpin + "\", \"join\")'";
					}
					DOM.messages.innerHTML += `
					<div class="align-self-${msg.sender === user.id ? "end self" : "start"} p-1 my-1 mx-3 bg-white message-item" id="msg-${msg.id.toString()}">
						<div class="options dropdown">
							<a href="#" class="${msg.is_deleted === 1 || (!chat.isGroup && chat.contact.id == "-999") ? "d-none" : ""} dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
								<i class="fas fa-angle-down text-muted px-2"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item ${isShowingComplaintHistory ? "d-none" : ""}" onclick="replyMessage('${msg.id}')" href="#">Reply</a>
								<a class="dropdown-item" href="#" onclick="fwdDestination('${msg.id}')" data-toggle="modal" data-target="#select-contact-fwd">Forward</a>
								<a class="dropdown-item ${msg.sender === user.id ? "" : "d-none"}" href="#" onclick="deleteMsg('${msg.id}')">Delete</a>
							</div>
						</div>
						${msg.reply_to != null ? reply_text : ""}
						${chat.isGroup ? htmlForGroup : ""}
						<div class="d-flex flex-col px-3 py-3 ${msg.sender === user.id ? "bg-purple" : "bg-lightgray"}" style="border-radius: 10px;">
							${kindImage}
							<div class="body m-1 mr-2" style="font-size: 14px;">
								<span><strong>${kind}</strong></span><br>
								<span>Title : ${msg.title}</span><br>
								${description == null ? "" : "<span>Description : " + msg.description + "</span><br>"}
								<span>Start : ${msg.time}</span><br>
								<span>${description == null ? "Initiator" : "Broadcaster"} : ${broadcaster}</span><br>
								${description == null ? "<a " + linkVCR + " style='cursor:pointer;'>Join Room</a><br>" : ""}
							</div>
						</div>
						<div class="time ml-auto text-right flex-shrink-0 align-self-end text-muted" style="width:75px; font-size: 10px;">
							${mDate(msg.time).getTime()}
							${msg.sender === user.id ? sendStatus : ""}
						</div>
					</div>
					`;
				} else {
					DOM.messages.innerHTML += `
					<div class="align-self-${msg.sender === user.id ? "end self" : "start"} my-1 mx-3 rounded bg-white message-item" id="msg-${msg.id.toString()}">
						<div class="options dropdown">
							<a href="#" class="${msg.is_deleted === 1 || (!chat.isGroup && chat.contact.id == "-999") ? "d-none" : ""} dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
								<i class="fas fa-angle-down text-muted px-2"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item ${isShowingComplaintHistory ? "d-none" : ""}" onclick="replyMessage('${msg.id}')" href="#">Reply</a>
								<a class="dropdown-item" href="#" onclick="fwdDestination('${msg.id}')" data-toggle="modal" data-target="#select-contact-fwd">Forward</a>
								<a class="dropdown-item ${msg.sender === user.id ? "" : "d-none"}" href="#" onclick="deleteMsg('${msg.id}')">Delete</a>
							</div>
						</div>
						${msg.reply_to != null ? reply_text : ""}
						${chat.isGroup ? htmlForGroup : ""}
						<div class="d-flex flex-row px-3 py-3 ${msg.sender === user.id ? "bg-purple" : "bg-lightgray"}" style="border-radius: 10px;">
							<div class="body" style="font-size: 14px;">${msgBody != "" ? msgBody + "<br>" : ""}${msgText}</div>
						</div>
						<div class="time ml-auto text-right flex-shrink-0 align-self-end text-muted" style="width:75px; font-size: 10px;">
							${mDate(msg.time).getTime()}
							${msg.sender === user.id ? sendStatus : ""}
						</div>
					</div>
					`;
				}
			}
		}
	}

	DOM.messages.scrollTo(0, DOM.messages.scrollHeight);
	// let msgItems = document.getElementByClassName('message-item');
	// msgItems[msgItems.length-1].scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
	// DOM.messages.scrollTop = DOM.messages.scrollHeight;
};

let offlineTimer = 0;

let periodicInterval = 3000;

let fetchPeriodicInterval = setInterval(function () {
	fetchMessagePeriodic(dir);
	fetchBotMessagePeriodic(localStorage.F_PIN, dir);
	fetchGroupPeriodic(dir);
	fetchDiscussionPeriodic();
	// fetchFriendPeriodic();
	// fetchProfile(dir);
	checkBlockSts();
	checkComplain();
	fetchNotifPeriodic();

	groupList.forEach((elem) => {
		fetchGroupMembers(elem.id);
	});

	init();

	if (chat != null && chat.is_complain == 1 && localStorage.getItem("complainID") != null) {
		// // // console.log('is ongoing complain');
		checkComplainStatus(localStorage.getItem("complainID"));
		mClassList(DOM.finishComplain).remove("d-none");
	}

	if (user.type != 24 && chat != null && chat.is_complain == 1) {
		fetchNotifPeriodic();
		fetchNotifCallPeriodic();
	}

	// online status
	if (user.isOnline === 0) {
		// mClassList(DOM.connectStatus).remove('status-online').add('status-offline');
		document.getElementById("connect-status").classList.remove("status-online");
		document.getElementById("connect-status").classList.add("status-offline");
		document.getElementById("status-text").textContent = " Offline";
		offlineTimer += 1; // count while offline for 60 seconds
		if (offlineTimer === 30) {
			pendingMsg = [];
			offlineTimer = 0;
		}
	} else {
		// mClassList(DOM.connectStatus).remove('status-offline').add('status-online');
		document.getElementById("connect-status").classList.remove("status-offline");
		document.getElementById("connect-status").classList.add("status-online");
		document.getElementById("status-text").textContent = " Online";
		if (pendingMsg.length > 0) {
			sendPendingMessage(pendingMsg);
		}
	}

	// if updated
	if (DOM.displayPic.src != user.pic || DOM.profilePic.src != user.pic) {
		DOM.displayPic.src = user.pic;
		DOM.profilePic.src = user.pic;
	}

	if (DOM.username.innerHTML != user.name) {
		DOM.username.innerHTML = user.name;
	}

	if (DOM.inputName.val != user.name) {
		DOM.inputName.val = user.name;
	}

	// update block status on active chat
	if (chat !== null && !chat.isGroup && chat.is_complain != 1) {
		updateBlockStsView();
	}

	let urlRegex = new RegExp("([a-zA-Z0-9]+://)?([a-zA-Z0-9_]+:[a-zA-Z0-9_]+@)?([a-zA-Z0-9.-]+\\.[A-Za-z]{2,4})(:[0-9]+)?([^ ])+");

	// if (!urlRegex.test(DOM.messageInput.value.trim())) {
	// 	mClassList(DOM.urlPreview).add("d-none");
	// }
}, periodicInterval);

let isCallCenterEditor = false;

let generateCallCenterEditor = () => {
	chat = {
		isGroup: false,
		unread: 0,
		block: "0",
		is_complain: 1,
	};

	isCallCenterEditor = true;

	mClassList(DOM.blockUserButton).add("d-none");
	mClassList(DOM.createTopicButton).add("d-none");
	mClassList(DOM.deleteConversation).add("d-none");
	mClassList(DOM.blockBar).add("d-none");
	mClassList(DOM.youAreBlocked).add("d-none");
	mClassList(DOM.youBlocked).add("d-none");
	// mClassList(DOM.finishComplain).add('d-none');

	DOM.messages.innerHTML = "";
	isShowingComplaintHistory = false;

	DOM.messageAreaDetails.innerHTML = "";

	mClassList(DOM.inputArea).contains("d-none", (elem) => elem.remove("d-none").add("d-flex"));
	mClassList(DOM.messageAreaOverlay).add("d-none");

	mClassList(DOM.openAttach).add("d-none");
	mClassList(DOM.openAttach).remove("d-block");

	hideInfo();
	hideFriendList();
	hideGroupList();

	if (window.innerWidth <= 575) {
		mClassList(DOM.chatListArea).remove("d-flex").add("d-none");
		mClassList(DOM.messageArea).remove("d-none").add("d-flex");
		areaSwapped = true;
	}
	//  else {
	// 	mClassList(elem).add("active");
	// }

	DOM.messageAreaPic.removeAttribute("onclick");

	DOM.messageAreaName.innerHTML = localStorage.cc_alias + " Contact Center";
	DOM.messageAreaPic.src = "/chatcore/assets/img/default_pp.png";

	DOM.messages.innerHTML += `
	<div class="align-self-start p-1 my-1 mx-3 bg-white message-item">
		<div class="d-flex flex-row bg-lightgray" style="border-radius: 10px;">
			<div class="body p-3 m-1 mr-2">
				<span class="ml-2">Welcome to ${localStorage.cc_alias} Contact Center</span>
				<div class="row">
					<div class="col-6">
						<div class="cc-button py-2 px-2 m-2 btn-warning d-flex justify-content-center text-center align-items-center" id="start-chat-cc" style="cursor:pointer; font-size: 12px; width: 150px; height: 50px;">
							Chat with a Representative
						</div>
						<div class="cc-button py-2 px-2 m-2 btn-warning d-flex justify-content-center text-center align-items-center" id="start-ac-cc" style="cursor:pointer; font-size: 12px; width: 150px; height: 50px;">
							Call a Representative
						</div>
					</div>
					<div class="col-6 p-0">
						<div class="cc-button py-2 px-2 m-2 btn-warning d-flex justify-content-center text-center align-items-center" style="font-size: 12px; width: 150px; height: 50px;">
							Email a Representative
						</div>
						<div class="cc-button py-2 px-2 m-2 btn-warning d-flex justify-content-center text-center align-items-center" id="start-vc-cc" style="cursor:pointer; font-size: 12px; width: 150px; height: 50px;">
							Video Call a Representative
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="time ml-auto text-right flex-shrink-0 align-self-end text-muted" style="width:75px; font-size: 10px;">
			${mDate().getTime()}
		</div>
	</div>
	`;

	let staffBusy = `
	<div class="align-self-start p-1 my-1 mx-3 bg-white message-item">
		<div class="d-flex flex-row bg-lightgray" style="border-radius: 10px;">
			<div class="body p-3 m-1 mr-2" style="font-size: 14px;">
				Sorry, currently all our representatives are busy helping other customers. Please try again later, and thank you for your patience!
			</div>
		</div>
		<div class="time ml-auto text-right flex-shrink-0 align-self-end text-muted" style="width:75px; font-size: 10px;">
			${mDate().getTime()}
		</div>
	</div>
	`;

	document.getElementById("start-chat-cc").addEventListener("click", () => {
		let msg_connecting = {
			id: localStorage.F_PIN + Date.now().toString(),
			sender: "",
			body: "Please wait while we are connecting you to one of our customer service representatives...",
			time: mDate().toString(),
			status: 1,
			// recvId: chat.isGroup ? chat.group.id : chat.contact.id,
			recvId: localStorage.F_PIN,
			recvIsGroup: false,
			is_complain: 1,
		};

		localStorage.setItem("complain_channel", "0");

		addMessageToMessageArea(msg_connecting);

		let formData = new FormData();
		formData.append("f_pin", localStorage.F_PIN);
		formData.append("channel", "0");
		var xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				// // console.log(xmlHttp.responseText);

				let data = JSON.parse(xmlHttp.responseText);
				console.log(data);

				mClassList(DOM.ccBar).contains("d-none", (elem) => elem.remove("d-none").add("d-flex"));

				mClassList(DOM.openAttach).remove("d-none");
				mClassList(DOM.openAttach).add("d-block");

				mClassList(DOM.finishComplain).remove("d-none");

				fetchFriendPeriodic();
				if (data.data != "") {
					localStorage.destination = data.data;
					chat.contact = contactList.find((el) => el.id === data.data);
					chat.name = chat.contact.name.trim();
					fetchMessagePeriodic(dir);
					// isOngoingCC = true;
				} else {
					DOM.messages.innerHTML += staffBusy;
				}
			}
		};
		xmlHttp.open("post", "/chatcore/logics/start_complain");
		xmlHttp.send(formData);
	});

	document.getElementById("start-ac-cc").addEventListener("click", () => {
		let msg_connecting = {
			id: localStorage.F_PIN + Date.now().toString(),
			sender: "",
			body: "Please wait while we are connecting you to one of our customer service representatives...",
			time: mDate().toString(),
			status: 1,
			// recvId: chat.isGroup ? chat.group.id : chat.contact.id,
			recvId: localStorage.F_PIN,
			recvIsGroup: false,
			is_complain: 1,
		};

		addMessageToMessageArea(msg_connecting);

		localStorage.setItem("complain_channel", "1");

		let formData = new FormData();
		formData.append("f_pin", localStorage.F_PIN);
		formData.append("channel", "1");
		var xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				// // console.log(xmlHttp.responseText);

				let data = JSON.parse(xmlHttp.responseText);

				mClassList(DOM.ccBar).contains("d-none", (elem) => elem.remove("d-none").add("d-flex"));

				mClassList(DOM.openAttach).remove("d-none");
				mClassList(DOM.openAttach).add("d-block");

				mClassList(DOM.finishComplain).remove("d-none");

				fetchFriendPeriodic();
				if (data.data != "") {
					localStorage.destination = data.data;
					chat.contact = contactList.find((el) => el.id === data.data);
					chat.name = chat.contact.name.trim();
					fetchMessagePeriodic(dir);
					// isOngoingCC = true;
				} else {
					DOM.messages.innerHTML += staffBusy;
				}

				//
				// setTimeout(function (){
				// 	if (data.data == "") {
				// 		let msg_connecting = {
				// 			id: localStorage.F_PIN + Date.now().toString(),
				// 			sender: '',
				// 			body: 'Sorry, currently all of our representatives are busy helping other customers.',
				// 			time: mDate().toString(),
				// 			status: 1,
				// 			// recvId: chat.isGroup ? chat.group.id : chat.contact.id,
				// 			recvId: localStorage.F_PIN,
				// 			recvIsGroup: false,
				// 			is_complain: 1
				// 		};

				// 		addMessageToMessageArea(msg_connecting);
				// 	}
				// }, 5000);
			}
		};
		xmlHttp.open("post", "/chatcore/logics/start_complain");
		xmlHttp.send(formData);
	});

	document.getElementById("start-vc-cc").addEventListener("click", () => {
		let msg_connecting = {
			id: localStorage.F_PIN + Date.now().toString(),
			sender: "",
			body: "Please wait while we are connecting you to one of our customer service representatives...",
			time: mDate().toString(),
			status: 1,
			// recvId: chat.isGroup ? chat.group.id : chat.contact.id,
			recvId: localStorage.F_PIN,
			recvIsGroup: false,
			is_complain: 1,
		};

		addMessageToMessageArea(msg_connecting);

		localStorage.setItem("complain_channel", "2");

		let formData = new FormData();
		formData.append("f_pin", localStorage.F_PIN);
		formData.append("channel", "2");
		var xmlHttp = new XMLHttpRequest();
		let ta = 0;
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 1) {
				ta = new Date().getTime();
				console.log("RQSTCC created");
			}
			if (xmlHttp.readyState == 1) {
				console.log("RQSTCC opened");
			}
			if (xmlHttp.readyState == 2) {
				console.log("RQSTCC sent");
			}
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				// // console.log(xmlHttp.responseText);

				let delay = new Date().getTime() - ta;

				console.log("RQSTCC " + delay);

				let data = JSON.parse(xmlHttp.responseText);

				mClassList(DOM.ccBar).contains("d-none", (elem) => elem.remove("d-none").add("d-flex"));

				mClassList(DOM.openAttach).remove("d-none");
				mClassList(DOM.openAttach).add("d-block");

				mClassList(DOM.finishComplain).remove("d-none");

				fetchFriendPeriodic();
				if (data.data != "") {
					localStorage.destination = data.data;
					chat.contact = contactList.find((el) => el.id === data.data);
					chat.name = chat.contact.name.trim();
					fetchMessagePeriodic(dir);
					// isOngoingCC = true;
				} else {
					DOM.messages.innerHTML += staffBusy;
				}

				//
			}
		};
		xmlHttp.open("post", "/chatcore/logics/start_complain");
		xmlHttp.send(formData);
	});
};

let checkUserType = () => {
	let formData = new FormData();

	formData.append("f_pin", user.id);

	var xmlHttp = new XMLHttpRequest();

	var url = "/chatcore/logics/fetch_user_type";
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// // console.log(xmlHttp.responseText);

			if (xmlHttp.responseText === "null") {
				generateCallCenterEditor();
			} else {
				// let data = JSON.parse(xmlHttp.responseText);

				$("#cc-staff").modal("show");

				DOM.ccCenter.addEventListener("click", () => {
					let chatListIndex = chatList.findIndex((el) => el.hasOwnProperty("contact") && el.contact.id === localStorage.cc_alias_fpin);
					// // console.log('pos: ' + chatListIndex);
					showFriendList();
					let chatListItem = document.getElementById("alias-" + localStorage.cc_alias_fpin);
					// // console.log(chatListItem);

					if (chatListIndex > -1) {
						$("#cc-staff").modal("hide");
						generateMessageArea(chatListItem, chatListIndex, false, false);
					} else {
						generateMessageArea(chatListItem, localStorage.cc_alias_fpin, true, false);
						$("#cc-staff").modal("hide");
					}
				});
			}
		}
	};
	xmlHttp.open("post", url);
	xmlHttp.send(formData);
};

// document.getElementById("open-cc").addEventListener("click", checkUserType);

let generateMessageArea = (elem, chatIndex, isNewChat, isGroup) => {
	let isNotTopic = true;
	isShowingComplaintHistory = false;
	isCallCenterEditor = false;

	if (isOngoingCC == true) {
		if (confirm("You have an ongoing contact center session at the moment. Would you like to end the session?")) {
			finishComplain();
		} else {
			return;
		}
	}

	// DOM.messageAreaPic.setAttribute('onclick', 'showInfo()');

	if (!isNewChat) {
		chat = chatList[chatIndex];
	} else {
		if (!isGroup) {
			chat = {
				contact: contactList.find((xyz) => xyz.id === chatIndex),
				isGroup: isGroup,
				unread: 0,
				name: contactList.find((xyz) => xyz.id === chatIndex).name,
				block: "0",
				is_complain: 0,
				is_topic: false,
			};
		} else {
			isNotTopic = groupList.some((xyz) => xyz.id === chatIndex);

			if (!isNotTopic) {
				chat = {
					group: topicList.find((xyz) => xyz.id === chatIndex),
					isGroup: isGroup,
					unread: 0,
					name: topicList.find((xyz) => xyz.id === chatIndex).title,
					is_topic: true,
					is_complain: 0,
				};
			} else {
				chat = {
					group: groupList.find((xyz) => xyz.id === chatIndex),
					isGroup: isGroup,
					unread: 0,
					name: groupList.find((xyz) => xyz.id === chatIndex).name,
					is_topic: false,
					is_complain: 0,
				};
			}

			createSubgroupButton();
		}
	}

	DOM.documentPop.classList.add("d-none");
	DOM.fileInput.value = "";
	hasFile = false;
	isReply = undefined;
	replyTo = undefined;

	mClassList(DOM.openAttach).add("d-block");
	mClassList(DOM.openAttach).remove("d-none");

	// block status
	if (chat.isGroup) {
		mClassList(DOM.blockUserButton).add("d-none");
		mClassList(DOM.youBlocked).add("d-none");
		mClassList(DOM.youAreBlocked).add("d-none");
		mClassList(DOM.blockBar).add("d-none");
		mClassList(DOM.blockBar).remove("d-flex");
		mClassList(DOM.finishComplain).add("d-none");
		mClassList(DOM.createTopicButton).remove("d-none");
	} else {
		mClassList(DOM.blockUserButton).remove("d-none");
		mClassList(DOM.createTopicButton).add("d-none");

		let isBlocked = blockList.some((el) => el.to === user.id && el.from === chat.contact.id); // user is blocked by
		let isBlocker = blockList.some((el) => el.from === user.id && el.to === chat.contact.id); // user is blocker

		if (isBlocked) {
			chat.block = "0";
			mClassList(DOM.blockUserButton).add("d-none");
			mClassList(DOM.blockBar).add("d-flex");
			mClassList(DOM.blockBar).remove("d-none");
			mClassList(DOM.youAreBlocked).add("d-none");
			mClassList(DOM.youBlocked).remove("d-none");
			mClassList(DOM.inputArea).add("d-none");
			mClassList(DOM.inputArea).remove("d-flex");
		} else if (isBlocker) {
			chat.block = "1";
			DOM.blockUserButton.innerHTML = "Unblock";
			mClassList(DOM.blockUserButton).remove("d-none");
			mClassList(DOM.blockBar).add("d-flex");
			mClassList(DOM.blockBar).remove("d-none");
			mClassList(DOM.youAreBlocked).remove("d-none");
			mClassList(DOM.youBlocked).add("d-none");
			mClassList(DOM.inputArea).add("d-none");
			mClassList(DOM.inputArea).remove("d-flex");
		} else {
			chat.block = "0";
			DOM.blockUserButton.innerHTML = "Block";
			mClassList(DOM.blockUserButton).remove("d-none");
			mClassList(DOM.blockBar).remove("d-flex");
			mClassList(DOM.blockBar).add("d-none");
			mClassList(DOM.youBlocked).add("d-none");
			mClassList(DOM.youAreBlocked).add("d-none");

			// chat dengan bot
			if (chat.contact.id == "-999") {
				mClassList(DOM.inputArea).remove("d-flex");
				mClassList(DOM.inputArea).add("d-none");
				mClassList(DOM.openAttach).add("d-none");
				mClassList(DOM.openAttach).remove("d-block");
				// view complain history
			} else if (chat.isViewHistory == true) {
				mClassList(DOM.inputArea).remove("d-flex");
				mClassList(DOM.inputArea).add("d-none");
				mClassList(DOM.openAttach).add("d-none");
				mClassList(DOM.openAttach).remove("d-block");
			} else {
				mClassList(DOM.inputArea).add("d-flex");
				mClassList(DOM.inputArea).remove("d-none");
			}
		}

		if (!chat.is_complain) {
			mClassList(DOM.finishComplain).add("d-none");
			mClassList(DOM.ccBar).contains("d-flex", (elem) => elem.remove("d-flex").add("d-none"));
			mClassList(DOM.deleteConversation).remove("d-none");
		} else {
			mClassList(DOM.blockUserButton).add("d-none");
			mClassList(DOM.blockBar).add("d-none");
			mClassList(DOM.blockBar).add("d-none");
			mClassList(DOM.youAreBlocked).add("d-none");
			mClassList(DOM.youBlocked).add("d-none");
			mClassList(DOM.finishComplain).remove("d-none");
			mClassList(DOM.deleteConversation).add("d-none");
			mClassList(DOM.ccBar).contains("d-none", (elem) => elem.remove("d-none").add("d-flex"));
		}
	}

	mClassList(DOM.urlPreview).add("d-none");
	msgInput = 0;
	document.getElementById("document").classList.add("d-none");
	DOM.messageInput.value = "";

	DOM.messageAreaDetails.innerHTML = "";

	mClassList(DOM.inputArea).contains("d-none", (elem) => elem.remove("d-none").add("d-flex"));

	mClassList(DOM.messageAreaOverlay).add("d-none");

	hideInfo();
	hideFriendList();
	hideGroupList();
	hideComplaintHistory();

	if (!isNewChat) {
		[...DOM.chatListItem].forEach((elem) => mClassList(elem).remove("active"));

		mClassList(elem).contains("unread", () => {
			MessageUtils.changeStatusById({
				isGroup: chat.isGroup,
				id: chat.isGroup ? chat.group.id : chat.contact.id,
			});
			mClassList(elem).remove("unread");
			mClassList(elem.querySelector("#unread-count")).add("d-none");
		});
	}

	if (window.innerWidth <= 575) {
		mClassList(DOM.chatListArea).remove("d-flex").add("d-none");
		mClassList(DOM.messageArea).remove("d-none").add("d-flex");
		areaSwapped = true;
	} else {
		mClassList(elem).add("active");
	}

	// // console.log(chat.name);
	DOM.messageAreaName.innerHTML = chat.name;
	DOM.messageAreaPic.src = chat.isGroup ? chat.group.pic : chat.contact.pic;

	// Message Area details ("last seen ..." for contacts / "..names.." for groups)
	if (chat.isGroup) {
		if (chat.is_topic == false) {
			DOM.messageAreaDetails.innerHTML = "Lounge";
		} else {
			DOM.messageAreaName.innerHTML = groupList.find((el) => el.id === chat.group.group_id).name;
			DOM.messageAreaDetails.innerHTML = chat.group.title;
		}
	} else {
		DOM.messageAreaDetails.innerHTML = `last seen ${mDate(chat.contact.lastSeen).lastSeenFormat()}`;
	}

	if (
		chat.is_complain == 1 ||
		(chat.isGroup == true && chat.group.hasOwnProperty("is_organization") && chat.group.is_organization == 1) ||
		(chat.isGroup && chat.group.name == "Internal" && user.user_type == 0) ||
		(!chat.isGroup && chat.contact.id == "-999")
	) {
		// console.log('is true');
		DOM.messageAreaPic.removeAttribute("onclick");
	} else {
		DOM.messageAreaPic.setAttribute("onclick", "showInfo()");
	}

	// if (chat.group.name == "Internal") {
	// 	// console.log(chat);
	// 	// console.log(user);
	// 	// console.log('what the heck');
	// }

	let msgs = chat.isGroup ? MessageUtils.getByGroupId(chat.group.id) : MessageUtils.getByContactId(chat.contact.id);

	DOM.messages.innerHTML = "";

	localStorage.setItem("destination", chat.isGroup ? chat.group.id : chat.contact.id);

	lastDate = "";

	// let isNotDel = msgs.filter(el => el.L_PIN === localStorage.F_PIN && el.status == -1);
	// let msgIdArr = [];
	// isNotDel.forEach(el => {
	// 	msgIdArr.push(el.id);
	// });

	tempBase64 = "";
	let counter = 0;
	msgs
		.sort((a, b) => mDate(a.time).subtract(b.time))
		.forEach((msg) => {
			// let checkInArr = msgIdArr.some(el => el === msg.id);
			// if (checkInArr) {
			// 	return;
			// }

			// if (msg.is_complain == 0 || typeof msg.is_complain == 'undefined') {
			if (chat.is_complain == 1) {
				if (msg.complainID == localStorage.getItem("complainID")) {
					console.log("ongoing: " + msg.complainID);
					console.log("localStorage: " + localStorage.getItem("complainID"));
					addMessageToMessageArea(msg);
				}
			} else {
				addMessageToMessageArea(msg);
			}

			counter++;
			if (msg.status < 4 && msg.status > -1 && msg.sender !== user.id) {
				// // console.log(msg);
				var formData = new FormData();
				formData.append("from", user.id);
				formData.append("message_id", msg.id);
				formData.append("f_pin", msg.sender);
				formData.append("l_pin", msg.recvId);
				// formData.append('scope', '3');
				if (!chat.isGroup) {
					formData.append("scope", "3");
				} else {
					formData.append("scope", "4");
				}
				formData.append("status", "4");
				formData.append("time", new Date().getTime().toString());
				formData.append("flag", localStorage.FLAG);

				// open xhr
				var xmlHttp = new XMLHttpRequest();
				var url = "/chatcore/logics/update_msg_status";
				xmlHttp.onreadystatechange = function () {
					if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
						// // console.log(xmlHttp.responseText);
						msg.status = 4;
					}
				};
				xmlHttp.open("post", url);
				xmlHttp.send(formData);
			}
			// }

			// if (counter == msgs.length-1) {
		});

	DOM.messages.innerHTML += `
		<div id="scroll-to-bottom" class="d-none endMessage-button text-center" style="cursor:pointer; top:12% !important;" onclick="scrollToBottom();">
		<img src="/chatcore/assets/img/down_arrow.png" />
		</div>
		`;
	// }

	// document.getElementById('scroll-to-bottom').addEventListener("click", function () {
	// 	var trueDivHeight = DOM.messages.scrollHeight;
	// 	var divHeight = $('#messages').height();
	// 	var scrollLeft = trueDivHeight - divHeight;
	// 	DOM.messages.scrollTop = scrollLeft;
	// });

	DOM.messages.scrollTo(0, DOM.messages.scrollHeight);

	DOM.messages.addEventListener("scroll", () => {
		var trueDivHeight = DOM.messages.scrollHeight;
		var divHeight = $("#messages").height();
		var scrollLeft = trueDivHeight - divHeight;
		// // console.log('curpos: ' + DOM.messages.scrollTop + ' | max scroll: ' + scrollLeft);
		if (DOM.messages.scrollTop < scrollLeft) {
			$("#scroll-to-bottom").removeClass("d-none");
		} else {
			$("#scroll-to-bottom").addClass("d-none");
		}
	});
};

let scrollToBottom = () => {
	var trueDivHeight = DOM.messages.scrollHeight;
	var divHeight = $("#messages").height();
	var scrollLeft = trueDivHeight - divHeight;
	DOM.messages.scrollTop = scrollLeft;
};

// document.getElementById('scroll-to-bottom').addEventListener("click", function() {
// 	var trueDivHeight = DOM.messages.scrollHeight;
// 	var divHeight = $('#messages').height();
// 	var scrollLeft = trueDivHeight - divHeight;
// 	DOM.messages.scrollTop = scrollLeft;
// });

let updateBlockStsView = () => {
	let isBlocked = blockList.some((el) => el.to === user.id && el.from === chat.contact.id); // user is blocked by
	let isBlocker = blockList.some((el) => el.from === user.id && el.to === chat.contact.id); // user is blocker

	if (!chat.hasOwnProperty("isViewHistory") || !chat.isViewHistory) {
		if (isBlocked) {
			chat.block = "0";
			mClassList(DOM.blockUserButton).add("d-none");
			mClassList(DOM.blockBar).add("d-flex");
			mClassList(DOM.blockBar).remove("d-none");
			mClassList(DOM.youAreBlocked).add("d-none");
			mClassList(DOM.youBlocked).remove("d-none");
			mClassList(DOM.inputArea).add("d-none");
			mClassList(DOM.inputArea).remove("d-flex");
			mClassList(DOM.createTopicButton).add("d-none");
		} else if (isBlocker) {
			chat.block = "1";
			DOM.blockUserButton.innerHTML = "Unblock";
			mClassList(DOM.blockUserButton).remove("d-none");
			mClassList(DOM.blockBar).add("d-flex");
			mClassList(DOM.blockBar).remove("d-none");
			mClassList(DOM.youAreBlocked).remove("d-none");
			mClassList(DOM.youBlocked).add("d-none");
			mClassList(DOM.inputArea).add("d-none");
			mClassList(DOM.inputArea).remove("d-flex");
			mClassList(DOM.createTopicButton).add("d-none");
		} else {
			chat.block = "0";

			// chat with bot
			if (chat != null && chat.contact.id == "-999") {
				mClassList(DOM.blockUserButton).add("d-none");
				mClassList(DOM.inputArea).remove("d-flex");
				mClassList(DOM.inputArea).add("d-none");
				mClassList(DOM.openAttach).add("d-none");
				mClassList(DOM.openAttach).remove("d-block");
				// view complain history
			} else if (chat != null && chat.isViewHistory == true) {
				mClassList(DOM.blockUserButton).add("d-none");
				mClassList(DOM.inputArea).remove("d-flex");
				mClassList(DOM.inputArea).add("d-none");
				mClassList(DOM.openAttach).add("d-none");
				mClassList(DOM.openAttach).remove("d-block");
				// complain before acc
			} else if (chat != null && chat.is_complain == 1 && !chat.hasOwnProperty("contact")) {
				mClassList(DOM.blockUserButton).add("d-none");
				mClassList(DOM.inputArea).remove("d-flex");
				mClassList(DOM.inputArea).add("d-none");
				mClassList(DOM.openAttach).add("d-none");
				mClassList(DOM.openAttach).remove("d-block");
			} else {
				mClassList(DOM.blockUserButton).remove("d-none");
				mClassList(DOM.inputArea).add("d-flex");
				mClassList(DOM.inputArea).remove("d-none");
			}

			DOM.blockUserButton.innerHTML = "Block";
			// mClassList(DOM.blockUserButton).remove('d-none');
			mClassList(DOM.blockBar).remove("d-flex");
			mClassList(DOM.blockBar).add("d-none");
			mClassList(DOM.youBlocked).add("d-none");
			mClassList(DOM.youAreBlocked).add("d-none");
			mClassList(DOM.createTopicButton).add("d-none");
		}
	} else if (chat.is_complain == 1) {
		mClassList(DOM.blockUserButton).add("d-none");
		mClassList(DOM.blockBar).add("d-none");
		mClassList(DOM.blockBar).add("d-none");
		mClassList(DOM.youAreBlocked).add("d-none");
		mClassList(DOM.youBlocked).add("d-none");
		mClassList(DOM.createTopicButton).add("d-none");
	}
};

// search result array
let searchResults = [];

let generateMsgSearchResult = (resultArr) => {
	DOM.messages.innerHTML = "";

	lastDate = "";
	resultArr.sort((a, b) => mDate(a.time).subtract(b.time)).forEach((msg) => addMessageToMessageArea(msg));
};

/** search message */
// DOM.msgSearchOpen.addEventListener('click', function (e) {
// 	e.preventDefault();
// 	e.stopPropagation();

// 	mClassList(DOM.msgSearchInput).remove('d-none');
// 	DOM.msgSearchInput.focus();
// });

// DOM.msgSearchInput.addEventListener('keyup', function (e) {
// 	searchResults = messages.filter(msg => msg.body.includes(DOM.msgSearchInput.value) && ((msg.sender === localStorage.F_PIN && msg.recvId === localStorage.destination) || (msg.sender === localStorage.destination && msg.recvId === localStorage.F_PIN)));

// 	if (e.key === 'Enter') {
// 		generateMsgSearchResult(searchResults);
// 	}

// 	if (DOM.msgSearchInput.value.trim() === "") {
// 		let msgs = chat.isGroup ? MessageUtils.getByGroupId(chat.group.id) : MessageUtils.getByContactId(chat.contact.id);

// 		DOM.messages.innerHTML = "";

// 		localStorage.setItem('destination', chat.isGroup ? chat.group.id : chat.contact.id);

// 		fetchPeriodicInterval = setInterval(function () {
// 			fetchMessagePeriodic();
// 		}, 1000);

// 		lastDate = "";
// 		msgs
// 			.sort((a, b) => mDate(a.time).subtract(b.time))
// 			.forEach((msg) => addMessageToMessageArea(msg));
// 	}
// });

let showChatList = () => {
	if (areaSwapped) {
		mClassList(DOM.chatListArea).remove("d-none").add("d-flex");
		mClassList(DOM.messageArea).remove("d-flex").add("d-none");
		areaSwapped = false;
	}
};

let pendingMsg = [];

let sendMessageCCStart = (msg) => {
	// addMessageToMessageArea(msg);
	MessageUtils.addMessage(msg);
	generateChatList();

	// message form data
	var formData = new FormData();
	formData.append("message_id", msg.id);
	formData.append("destination", msg.recvId);
	formData.append("originator", msg.sender);
	formData.append("content", msg.body);
	formData.append("sent_time", msg.time);
	formData.append("status", 1);
	formData.append("scope", "3");
	formData.append("chat_id", "");
	formData.append("flag", localStorage.FLAG);

	// if (chat.is_complain) {
	formData.append("is_complaint", "1");
	formData.append("call_center_id", localStorage.getItem("complainID"));
	// }

	// open xhr
	var xmlHttp = new XMLHttpRequest();
	var url = "/chatcore/logics/digisales/send_file";
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// // console.log(xmlHttp.responseText);
			document.getElementById(custfpin).click();
			isOngoingCC = true;
			addMessageToMessageArea(msg);
		}
	};
	xmlHttp.open("post", url);
	xmlHttp.send(formData);
};

let sendMessage = () => {
	let value = DOM.messageInput.value;
	DOM.messageInput.value = "";
	if (chat.block === "1") {
		return;
	} else if (value.trim() === "" && hasFile === false) {
		alert("Please write a message.");
		return;
	} else if (chat.is_complain == 1 && isOngoingCC == false) {
		alert("Unable to send message. Waiting for an officer to accept your request.");
		return;
	} else if (hasFile === true) {
		sendFile();
	} else {
		let msg_id = localStorage.F_PIN + Date.now().toString();

		hasFile = false;

		let msg = {
			id: msg_id,
			sender: localStorage.F_PIN,
			body: value,
			time: mDate().toString(),
			status: 1,
			recvId: localStorage.destination,
			recvIsGroup: chat.isGroup,
			is_complain: chat.is_complain,
		};

		let scope = "3";
		let chat_id = "";
		let destination = localStorage.destination;

		if (chat.isGroup) {
			scope = "4";
			let isTopic = topicList.some((topic) => topic.id === localStorage.destination);

			if (isTopic) {
				chat_id = localStorage.destination;
				destination = chat.group.group_id;
			}
		}

		// if (user.isOnline === 1) {

		addMessageToMessageArea(msg);
		MessageUtils.addMessage(msg);
		// generateChatList();

		// message form data
		var formData = new FormData();
		formData.append("message_id", msg_id);
		formData.append("destination", destination);
		formData.append("originator", localStorage.F_PIN);
		formData.append("content", value);
		formData.append("sent_time", Date.now());
		formData.append("scope", scope);
		formData.append("chat_id", chat_id);
		formData.append("flag", localStorage.FLAG);

		if (chat.is_complain) {
			formData.append("is_complain", "1");
			formData.append("call_center_id", localStorage.getItem("complainID"));
		}

		// open xhr
		var xmlHttp = new XMLHttpRequest();
		var url = "/chatcore/logics/send_message";
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				// // console.log(xmlHttp.responseText);
				isReply = false;
			}
		};
		xmlHttp.open("post", url);
		xmlHttp.send(formData);
		// } else {
		// 	// const found = pendingMsg.some(el => el.id === msg.id);
		// 	// if (!found) {
		// 	// 	pendingMsg.push(msg);
		// 	// }
		// 	alert('You are currently offline. Please make sure your catchUp is online.');
		// }
	}
};

let sendPendingMessage = (msgArr) => {
	msgArr.forEach((el, index) => {
		let scope = "3";
		let chat_id = "";
		let destination = el.recvId;

		if (el.recvIsGroup) {
			scope = "4";
			let isTopic = topicList.some((topic) => topic.id === el.recvId);

			if (isTopic) {
				chat_id = el.recvId;
				destination = chat.group.group_id;
			}
		}

		// message form data
		var formData = new FormData();
		formData.append("message_id", el.id);
		formData.append("destination", destination);
		formData.append("originator", localStorage.F_PIN);
		formData.append("content", el.body);
		formData.append("sent_time", Date.now());
		formData.append("scope", scope);
		formData.append("chat_id", chat_id);

		// open xhr
		var xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				// // console.log(xmlHttp.responseText);

				document
					.getElementById("msg-" + el.id)
					.getElementsByClassName("fa-check-circle")[0]
					.classList.remove("far");
				document
					.getElementById("msg-" + el.id)
					.getElementsByClassName("fa-check-circle")[0]
					.classList.add("fas");
			}
		};
		xmlHttp.open("post", "/chatcore/logics/send_message");
		xmlHttp.send(formData);

		msgArr.splice(index, 1);
	});
};

let tempBase64 = "";

// when user insert something
DOM.fileInput.addEventListener("input", function (evt) {
	document.getElementById("input").focus();

	if (this.files[0].size > 2097152) {
		alert("File is too big!");
		this.value = "";
		return;
	}

	var reader = new FileReader();
	reader.onload = function () {
		// // // console.log(reader.result);//base64encoded string
		tempBase64 = reader.result;
	};
	reader.onerror = function (error) {
		// // console.log('Error: ', error);
	};
	reader.readAsDataURL(this.files[0]);

	document.getElementById("document").classList.remove("d-none");

	let doc = this.value.split("\\");
	hex = Date.now().toString(16);

	hasFile = true;

	if (doc.length) {
		// document.getElementById("document-name").innerHTML = doc[doc.length - 1];

		if (isImage(getExtension(doc[doc.length - 1]))) {
			document.getElementById("preview-img").innerHTML = "<img src='../../assets/img/thumb_image.png' style='height:100px; width: auto;'>";
		} else if (isAudio(getExtension(doc[doc.length - 1]))) {
			document.getElementById("preview-img").innerHTML = "<img src='../../assets/img/thumb_audio.png' style='height:100px; width: auto;'>";
		} else if (isVideo(getExtension(doc[doc.length - 1]))) {
			document.getElementById("preview-img").innerHTML = "<img src='../../assets/img/thumb_video.png' style='height:100px; width: auto;'>";
		} else {
			document.getElementById("preview-img").innerHTML = "<img src='../../assets/img/thumb_document.png' style='height:100px; width: auto;'>";
		}
	}

	document.getElementById("document-name").innerHTML = localStorage.F_PIN + "-" + hex + "." + getExtension(doc[doc.length - 1]);
});

DOM.editGroupPic.addEventListener("input", function (evt) {
	if (this.files[0].size > 2097152) {
		alert("File is too big!");
		this.value = "";
		return;
	}

	var reader = new FileReader();
	reader.onload = function () {
		// console.log(reader.result);//base64encoded string
		DOM.personProfPic.src = reader.result;
	};
	reader.onerror = function (error) {
		// // console.log('Error: ', error);
	};
	reader.readAsDataURL(this.files[0]);

	let doc = this.value.split("\\");
	hex = Date.now().toString(16);
});

// let previewReply = () => {
// 	DOM.replyPreview.classList.remove("d-none");
// };

let blockUser = () => {
	if (chat.isGroup) {
		// nothing
	} else {
		let str = "Block " + chat.name.trim() + "?";

		if (chat.block === "1") {
			str = "Unblock " + chat.name.trim() + "?";
		}

		if (confirm(str)) {
			// alert(chat.name.trim() + " blocked.");

			let formData = new FormData();

			let blockSts = "1"; // block user

			// if (!isBlock) {
			// 	blockSts = '0'; // unblock user
			// }
			if (chat.block === "1") {
				blockSts = "0";
			}

			formData.append("from", user.id);
			formData.append("to", chat.contact.id);
			formData.append("block", blockSts);
			formData.append("flag", localStorage.FLAG);

			var xmlHttp = new XMLHttpRequest();
			xmlHttp.onreadystatechange = function () {
				if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
					// // console.log(xmlHttp.responseText);
				}
			};
			xmlHttp.open("post", "/chatcore/logics/block_user");
			xmlHttp.send(formData);
		}
	}
};

// get uploaded file extension
let getExtension = (filename) => {
	var parts = filename.split(".");
	return parts[parts.length - 1];
};

// check if the uploaded file is video
let isVideo = (filename) => {
	var ext = getExtension(filename);
	switch (ext.toLowerCase()) {
		case "m4v":
		case "avi":
		case "mpg":
		case "mp4":
		case "webm":
		case "mov":
		case "wmv":
		case "flv":
		case "mkv":
		case "gif":
			// etc
			return true;
	}
	return false;
};

// check if the uploaded file is audio
let isAudio = (filename) => {
	var ext = getExtension(filename);
	switch (ext.toLowerCase()) {
		case "m4a":
		case "flac":
		case "mp3":
		case "wav":
		case "wma":
		case "aac":
			// etc
			return true;
	}
	return false;
};

// check if the uploaded file is image
let isImage = (filename) => {
	var ext = getExtension(filename);
	switch (ext.toLowerCase()) {
		case "jpg":
		case "jpeg":
		case "png":
			// etc
			return true;
	}
	return false;
};

let hasFile = false;

let sendFile = () => {
	let value = DOM.fileInput.value;
	let content = DOM.messageInput.value;
	let text_value = DOM.messageInput.value;
	DOM.messageInput.value = "";
	// if (value === "") return;

	if (chat.block === "1") {
		return;
	} else if (text_value.trim() === "" && hasFile === false) {
		alert("Please write a message.");
		return;
	} else if (user.user_type == 0 && chat.isGroup && chat.group.name == "Internal") {
		alert("You have no permission to send messages in this group.");
		return;
	} else if (chat.is_complain == 1 && isOngoingCC == false && isCallCenterEditor == true) {
		alert("Unable to send message. Waiting for an officer to accept your request.");
		return;
	} else if (text_value != "" && text_value.length > 1000) {
		alert("Your message exceeds the maximum limit of 1000 characters!");
		DOM.messageInput.value = text_value;
	} else {
		let msg_id = localStorage.F_PIN + Date.now().toString();

		let fileId = "";
		let file;
		let filetype = "";

		if (value !== "") {
			// let root = 'https://' + location.host;
			var root = "http://202.158.33.26:2809";

			file = DOM.fileInput.files[0];
			fileId = localStorage.F_PIN + "-" + hex + "." + getExtension(file.name);

			if (isImage(getExtension(file.name))) {
				filetype = "image";
			} else if (isAudio(getExtension(file.name))) {
				filetype = "audio";
			} else if (isVideo(getExtension(file.name))) {
				filetype = "video";
			} else {
				filetype = "file";
			}
		}

		let msg = {
			id: msg_id,
			sender: localStorage.F_PIN,
			body: content,
			file_id: fileId,
			time: mDate().toString(),
			status: 1,
			recvId: chat.isGroup ? chat.group.id : chat.contact.id,
			recvIsGroup: chat.isGroup,
			file: filetype,
			is_complain: chat.is_complain,
			is_deleted: 0,
		};

		if (isReply == true) {
			msg.reply_to = replyTo;
		}

		let scope = "3";
		let chat_id = "";
		let destination = localStorage.destination;

		if (chat.isGroup) {
			scope = "4";
			let isTopic = topicList.some((topic) => topic.id === localStorage.destination);

			if (isTopic) {
				chat_id = localStorage.destination;
				destination = chat.group.group_id;
			}
		}

		if (user.isOnline === 1) {
			setTimeout(addMessageToMessageArea(msg), 500);
			// addMessageToMessageArea(msg);
			MessageUtils.addMessage(msg);
			generateChatList();
			tempBase64 = "";

			// message form data
			var formData = new FormData();
			formData.append("message_id", msg_id);
			formData.append("destination", destination);
			formData.append("originator", localStorage.F_PIN);
			formData.append("sent_time", Date.now());
			// formData.append('file', file, file.name);
			// if (value !== '') {
			// 	formData.append('file', file, file.name);
			// }
			formData.append("content", content);
			formData.append("hex", hex);
			formData.append("scope", scope);
			formData.append("chat_id", chat_id);
			formData.append("is_chrome", isChrome);
			formData.append("flag", localStorage.FLAG);
			if (isReply == true) {
				formData.append("reply_to", replyTo);
			}

			if (chat.is_complain) {
				formData.append("is_complaint", "1");
				formData.append("call_center_id", localStorage.getItem("complainID"));
			}

			if (value !== "") {
				formData.append("file", file, file.name);
				if (isVideo(file.name)) {
					var canvas = document.createElement("canvas");
					var video = document.createElement("video");
					var fullQuality = "";
					video.src = URL.createObjectURL(file);
					video.addEventListener("canplay", function () {
						canvas.getContext("2d").drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
						fullQuality = canvas.toDataURL("image/jpeg", 1.0);

						fetch(fullQuality)
							.then((res) => res.blob())
							.then((blob) => {
								const thumbnailVideo = new File([blob], "image.jpg", {
									type: "image/jpeg",
								});
								formData.append("thumbnail", thumbnailVideo, thumbnailVideo.name);

								// open xhr
								var xmlHttp = new XMLHttpRequest();
								xmlHttp.onreadystatechange = function () {
									if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
										isReply = undefined;
										replyTo = undefined;
										document.getElementById("document").classList.add("d-none");
									}
								};
								xmlHttp.open("post", "/chatcore/logics/digisales/send_file");
								xmlHttp.send(formData);
								DOM.documentPop.classList.add("d-none");
								DOM.fileInput.value = "";
								hasFile = false;
							});
					});
				} else {
					// open xhr
					var xmlHttp = new XMLHttpRequest();
					xmlHttp.onreadystatechange = function () {
						if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
							isReply = undefined;
							replyTo = undefined;
							document.getElementById("document").classList.add("d-none");
						}
					};
					xmlHttp.open("post", "/chatcore/logics/digisales/send_file");
					xmlHttp.send(formData);
					DOM.documentPop.classList.add("d-none");
					DOM.fileInput.value = "";
					hasFile = false;
				}
			} else {
				var xmlHttp = new XMLHttpRequest();
				xmlHttp.onreadystatechange = function () {
					if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
						isReply = undefined;
						replyTo = undefined;
						document.getElementById("document").classList.add("d-none");
					}
				};
				xmlHttp.open("post", "/chatcore/logics/digisales/send_file");
				xmlHttp.send(formData);
			}

			DOM.messageInput.value = "";
			mClassList(DOM.urlPreview).add("d-none");
			msgInput = 0;
		} else {
			alert("You are currently offline. Please make sure your catchUp is online.");
		}
	}
};

DOM.messageInput.addEventListener("keyup", function (e) {
	if (e.key === "Enter") {
		if (DOM.messageInput.value.trim() === "" && hasFile === false) {
			alert("Please write a message.");
		} else {
			sendFile();
			mClassList(DOM.urlPreview).add("d-none");
			msgInput = 0;
		}
		// let urlRegex = new RegExp("([a-zA-Z0-9]+:\/\/)?([a-zA-Z0-9_]+:[a-zA-Z0-9_]+@)?([a-zA-Z0-9.-]+\\.[A-Za-z]{2,4})(:[0-9]+)?([^ ])+");
		// if (!urlRegex.test(DOM.messageInput.value.trim())) {
		// 	mClassList(DOM.urlPreview).add("d-none");
		// 	msgInput = 0;
		// }
	}
});

let msgInput = 0;

DOM.messageInput.addEventListener("input", function (e) {
	// send using enter key

	if (DOM.messageInput.value.trim() == "") {
		mClassList(DOM.urlPreview).add("d-none");
		// }, 1000);
		msgInput = 0;
		return;
	}
	// if message contains url
	let urlRegex = new RegExp("([a-zA-Z0-9]+://)?([a-zA-Z0-9_]+:[a-zA-Z0-9_]+@)?([a-zA-Z0-9.-]+\\.[A-Za-z]{2,4})(:[0-9]+)?([^ ])+");

	if (urlRegex.test(DOM.messageInput.value.trim()) && msgInput == 0) {
		let contentUrl = DOM.messageInput.value.match(urlRegex)[0];

		// open xhr
		let xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				let img = $(xmlHttp.responseText).filter('meta[property="og:image"]').attr("content");
				if (typeof img === "undefined") {
					img = "../assets/img/document.png";
				}
				// var title = $(data).filter('meta[property="og:title"]').attr("content");
				let title = $(xmlHttp.responseText).filter("title").text();
				let description = $(xmlHttp.responseText).filter('meta[property="og:description"],meta[name="description"],meta[name="twitter:description"],meta[itemprop="description"]').attr("content");

				DOM.urlPreviewIcon.src = img;
				DOM.urlPreviewTitle.innerHTML = title;
				DOM.urlPreviewDesc.innerHTML = description;

				mClassList(DOM.urlPreview).remove("d-none");
			}
		};

		msgInput++;
		xmlHttp.open("get", "https://cors.bridged.cc/" + contentUrl);
		xmlHttp.send(null);
	} else if (!urlRegex.test(DOM.messageInput.value) || DOM.messageInput.value.trim() == "") {
		// setTimeout(function() {
		mClassList(DOM.urlPreview).add("d-none");
		// }, 1000);
		msgInput = 0;
	}
});

DOM.messageInput.addEventListener("oninput", function (e) {});

let isProfileOpen = false;
let showProfileSettings = () => {
	DOM.profileSettings.style.left = 0;
	DOM.profilePic.src = user.pic;
	DOM.inputName.value = user.name;
	isProfileOpen = true;
};

let hideProfileSettings = () => {
	DOM.profileSettings.style.left = "-110%";
	DOM.username.innerHTML = user.name;
	isProfileOpen = false;
};

let isFriendListOpen = false;
let isGroupListOpen = false;

// function checkUserTypeFPin(fpin, cb) {
// 	let formData = new FormData();

// 	formData.append('f_pin', fpin);

// 	var xmlHttp = new XMLHttpRequest();

// 	var url = "/chatcore/logics/fetch_user_type";
// 	xmlHttp.onreadystatechange = function () {
// 		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
// 			// // // console.log(xmlHttp.responseText);

// 			// let userType = 'common';

// 			if (xmlHttp.responseText !== 'null') {
// 				userType = 'staff';
// 			}

// 			// return userType;
// 		}
// 	}
// 	xmlHttp.open("post", url);
// 	xmlHttp.send(formData);
// }

let appendUserType = () => {
	let indexProcessed = 0;
	// console.log("processing");
	contactList
		.sort((a, b) => {
			let fa = a.name.toLowerCase();
			let fb = b.name.toLowerCase();

			if (fa < fb) {
				return -1;
			}
			if (fa > fb) {
				return 1;
			}
			return 0;
		})
		.forEach((elem, index) => {
			let formData = new FormData();

			formData.append("f_pin", elem.id);

			var xmlHttp = new XMLHttpRequest();

			var url = "/chatcore/logics/fetch_user_type";
			xmlHttp.onreadystatechange = function () {
				if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
					// // // console.log(xmlHttp.responseText);

					if (!elem.hasOwnProperty("isStaff")) {
						if (xmlHttp.responseText !== "null") {
							elem.isStaff = "1";
						} else {
							elem.isStaff = "0";
						}
					}
					indexProcessed++;
					if (indexProcessed == contactList.length) {
						populateChatList();
						// // console.log("append periodic");
						viewChatList();
						// console.log("harusnya jalan coy");

						// checkOngoingComplaint();
						// if (chat == null) {
						// checkOngoingComplaint();
						// }
					}
				}
			};
			xmlHttp.open("post", url);
			xmlHttp.send(formData);
		});
};

DOM.searchFriend.addEventListener("keyup", (ev) => {
	if (ev.key === "Enter") {
		if (DOM.searchFriend.value.trim() == "") {
			// return;
			DOM.searchFriendClear.click();
		} else {
			showFriendList();

			let matchingFriends = contactList.filter((elem) => elem.name.toLowerCase().includes(DOM.searchFriend.value));
			console.log(matchingFriends);


			DOM.friendList.innerHTML = "";

			matchingFriends
				.sort((a, b) => {
					let fa = a.name.toLowerCase();
					let fb = b.name.toLowerCase();

					if (fa < fb) {
						return -1;
					}
					if (fa > fb) {
						return 1;
					}
					return 0;
				})
				.forEach((elem, index) => {
					if (elem.id !== localStorage.F_PIN && elem.id != "-999") {
						// exclude self from friend list view, for arr = friend list
						let badge = "";
						if (elem.id == localStorage.cc_alias_fpin) {
							// is company account
							badge = '<i class="fas fa-check-circle" style="color:#306EFF;"></i>';
						} else if (elem.isStaff == "1") {
							badge = '<i class="fas fa-user"></i>';
						} else if (elem.user_type == 23) {
							badge = '<i class="fas fa-check-circle" style="color:red;"></i>';
						}
						DOM.friendList.innerHTML += `
			<div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" ${elem.id === localStorage.cc_alias_fpin ? 'id="alias-' + elem.id + '"' : ""}  onclick="generateMessageArea(this, '${elem.id}', true, false)">
				<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px; object-fit:cover;">
				<div class="w-50">
					<div class="name">${badge} ${elem.name}</div>
				</div>
			</div>
			`;
					}
				});
		}
	}
});

DOM.searchFriendClear.addEventListener("click", () => {
	DOM.searchFriend.value = "";
	DOM.friendList.innerHTML = "";

	contactList
		.sort((a, b) => {
			let fa = a.name.toLowerCase();
			let fb = b.name.toLowerCase();

			if (fa < fb) {
				return -1;
			}
			if (fa > fb) {
				return 1;
			}
			return 0;
		})
		.forEach((elem, index) => {
			if (elem.id !== localStorage.F_PIN && elem.id != "-999") {
				// exclude self from friend list view, for arr = friend list
				let badge = "";
				if (elem.id == localStorage.cc_alias_fpin) {
					// is company account
					badge = '<i class="fas fa-check-circle" style="color:#306EFF;"></i>';
				} else if (elem.isStaff == "1") {
					badge = '<i class="fas fa-user"></i>';
				} else if (elem.user_type == 23) {
					badge = '<i class="fas fa-check-circle" style="color:red;"></i>';
				}
				DOM.friendList.innerHTML += `
		<div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" ${elem.id === localStorage.cc_alias_fpin ? 'id="alias-' + elem.id + '"' : ""}  onclick="generateMessageArea(this, '${elem.id}', true, false)">
			<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px; object-fit:cover;">
			<div class="w-50">
				<div class="name">${badge} ${elem.name}</div>
			</div>
		</div>
		`;
			}
		});
});

DOM.searchFriendFwd.addEventListener("keyup", (ev) => {
	if (ev.key === "Enter") {
		if (DOM.searchFriendFwd.value.trim() == "") {
			// return;
			DOM.searchFriendFwdClear.click();
		} else {
			let matchingFriends = contactList.filter((elem) => elem.name.toLowerCase().includes(DOM.searchFriendFwd.value));
			// console.log(matchingFriends);

			DOM.selectFriendFwd.innerHTML = "";

			matchingFriends
				.sort((a, b) => {
					let fa = a.name.toLowerCase();
					let fb = b.name.toLowerCase();

					if (fa < fb) {
						return -1;
					}
					if (fa > fb) {
						return 1;
					}
					return 0;
				})
				.forEach((elem, index) => {
					if (elem.id !== localStorage.F_PIN && elem.id != "-999") {
						// exclude self from friend list view, for arr = friend list
						let badge = "";
						if (elem.id == localStorage.cc_alias_fpin) {
							// is company account
							badge = '<i class="fas fa-check-circle" style="color:#306EFF;"></i>';
						} else if (elem.isStaff == "1") {
							badge = '<i class="fas fa-user"></i>';
						} else if (elem.user_type == 23) {
							badge = '<i class="fas fa-check-circle" style="color:red;"></i>';
						}
						DOM.selectFriendFwd.innerHTML += `
			<div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" ${elem.id === localStorage.cc_alias_fpin ? 'id="alias-' + elem.id + '"' : ""}  onclick="generateMessageArea(this, '${elem.id}', true, false); fwdMessage('${elem.id}')">
				<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px; object-fit:cover;">
				<div class="w-50">
					<div class="name">${badge} ${elem.name}</div>
				</div>
			</div>
			`;
					}
				});
		}
	}
});

DOM.searchFriendFwdClear.addEventListener("click", () => {
	DOM.searchFriendFwd.value = "";
	DOM.selectFriendFwd.innerHTML = "";

	contactList
		.sort((a, b) => {
			let fa = a.name.toLowerCase();
			let fb = b.name.toLowerCase();

			if (fa < fb) {
				return -1;
			}
			if (fa > fb) {
				return 1;
			}
			return 0;
		})
		.forEach((elem, index) => {
			if (elem.id !== localStorage.F_PIN && elem.id != "-999") {
				// exclude self from friend list view, for arr = friend list
				let badge = "";
				if (elem.id == localStorage.cc_alias_fpin) {
					// is company account
					badge = '<i class="fas fa-check-circle" style="color:#306EFF;"></i>';
				} else if (elem.isStaff == "1") {
					badge = '<i class="fas fa-user"></i>';
				} else if (elem.user_type == 23) {
					badge = '<i class="fas fa-check-circle" style="color:red;"></i>';
				}
				DOM.selectFriendFwd.innerHTML += `
		<div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" ${elem.id === localStorage.cc_alias_fpin ? 'id="alias-' + elem.id + '"' : ""}  onclick="generateMessageArea(this, '${elem.id}', true, false); fwdMessage('${elem.id}')">
			<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px; object-fit:cover;">
			<div class="w-50">
				<div class="name">${badge} ${elem.name}</div>
			</div>
		</div>
		`;
			}
		});
});

let showFriendList = () => {
	DOM.friendList.style.left = 0;
	DOM.friendList.innerHTML = "";
	mClassList(DOM.chatList).add("d-none");
	mClassList(DOM.friendList).remove("d-none");
	$("#search-friend-div").removeClass("d-none");
	$("#search-friend-div").addClass("d-flex");
	isFriendListOpen = true;
	DOM.chatListNavbar.innerHTML = `
	<i class="fas fa-arrow-left p-2 mx-3 my-1" style="font-size: 1.5rem; cursor: pointer;" onclick="hideFriendList()"></i>
						<div class="font-weight-bold">New chat</div>
	`;

	contactList
		.sort((a, b) => {
			let fa = a.name.toLowerCase();
			let fb = b.name.toLowerCase();

			if (fa < fb) {
				return -1;
			}
			if (fa > fb) {
				return 1;
			}
			return 0;
		})
		.forEach((elem, index) => {
			if (elem.id !== localStorage.F_PIN && elem.id != "-999") {
				// exclude self from friend list view, for arr = friend list
				let badge = "";
				if (elem.id == localStorage.cc_alias_fpin) {
					// is company account
					badge = '<i class="fas fa-check-circle" style="color:#306EFF;"></i>';
				} else if (elem.isStaff == "1") {
					badge = '<i class="fas fa-user"></i>';
				} else if (elem.user_type == 23) {
					badge = '<i class="fas fa-check-circle" style="color:red;"></i>';
				}
				DOM.friendList.innerHTML += `
		<div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" ${elem.id === localStorage.cc_alias_fpin ? 'id="alias-' + elem.id + '"' : ""}  onclick="generateMessageArea(this, '${elem.id}', true, false)">
			<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
			<div class="w-50">
				<div class="name">${badge} ${elem.name}</div>
			</div>
		</div>
		`;
			}
		});

	let friendNames = [];
	contactList.forEach((elem) => {
		if (elem.id != "-999" && elem.id != user.id) {
			friendNames.push(elem.name.trim());
		}
	});
	$("#search-friend").autocomplete({
		source: friendNames,
		appendTo: "#search-friend-div",
	});
};

let addMemberToGroup = (grpId, m_pin) => {
	// $("#nonmember-" + m_pin).addClass("d-none");
	// $("#nonmember-" + m_pin).removeClass("d-flex");

	let formData = new FormData();
	formData.append("from", user.id);
	formData.append("group_id", grpId);
	formData.append("member_pin", m_pin);

	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			console.log(xmlHttp.responseText);
			$("#nonmember-" + m_pin).addClass("d-none");
			$("#nonmember-" + m_pin).removeClass("d-flex");
		}
	};
	xmlHttp.open("post", "/chatcore/logics/submit_add_group_member");
	xmlHttp.send(formData);
};

let selectGroupMember = () => {
	// DOM.chatListNavbar.innerHTML = `
	// <i class="fas fa-arrow-left p-2 mx-3 my-1 text-white" style="font-size: 1.5rem; cursor: pointer;" onclick="hideFriendList()"></i>
	// 					<div class="text-white font-weight-bold">New chat</div>
	// `;

	DOM.selectMemberWrap.innerHTML = "";

	// let difference = arr1.filter(x => !arr2.includes(x));
	let curGroupMember = groupMembers.filter((abc) => abc.group_id == chat.group.id);
	console.log(curGroupMember);
	let difference = contactList.filter((x) => !curGroupMember.includes(x.id));
	console.log(difference);

	difference
		.sort((a, b) => {
			let fa = a.name.toLowerCase();
			let fb = b.name.toLowerCase();

			if (fa < fb) {
				return -1;
			}
			if (fa > fb) {
				return 1;
			}
			return 0;
		})
		.forEach((elem, index) => {
			if (elem.id !== localStorage.F_PIN && elem.id != "-999" && elem.id != localStorage.cc_alias_fpin) {
				// exclude self from friend list view, for arr = friend list
				let badge = "";
				if (elem.id == localStorage.cc_alias_fpin) {
					// is company account
					badge = '<i class="fas fa-check-circle" style="color:#306EFF;"></i>';
				} else if (elem.isStaff == "1") {
					badge = '<i class="fas fa-user"></i>';
				} else if (elem.user_type == 23) {
					badge = '<i class="fas fa-check-circle" style="color:red;"></i>';
				}
				DOM.selectMemberWrap.innerHTML += `
		<div id="nonmember-${elem.id}" class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" onclick="addMemberToGroup('${chat.group.id}', '${elem.id}')">
			<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
			<div class="w-50">
				<div class="name">${badge} ${elem.name}</div>
			</div>
		</div>
		`;
			}
		});

	let friendNames = [];
	difference.forEach((elem) => {
		if (elem.id != "-999" && elem.id != user.id && elem.id != localStorage.cc_alias_fpin) {
			friendNames.push(elem.name.trim());
		}
	});
	$("#search-member").autocomplete({
		source: friendNames,
		appendTo: "#search-member-div",
	});
};

DOM.addGroupMember.addEventListener("click", (e) => {
	selectGroupMember();

	$("#select-group-member").modal("toggle");
});

let hideFriendList = () => {
	DOM.friendList.style.left = "-110%";

	isFriendListOpen = false;

	mClassList(DOM.chatList).remove("d-none");
	mClassList(DOM.friendList).add("d-none");

	// $("#search-friend-div").addClass("d-none");
	$("#search-friend-div").removeClass("d-flex");
	DOM.friendList.innerHTML = "";
	DOM.searchFriend.value = "";

	// DOM.chatListNavbar.innerHTML =
	// 	`
	// <img onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px; cursor:pointer;" onclick="showProfileSettings()" id="display-pic" src="` +
	// 	user.pic +
	// 	`">
	// <div class="w-50">
	// 	<div class="text-white font-weight-bold" id="username">` +
	// 	user.name +
	// 	`</div>
	// 	<div id="connect-status"></div>
	// 	<div class="text-white" id="status-text"></div>
	// </div>
	// <div class="nav-item dropdown ml-auto">
	// 	<i class="fa fa-users text-white" onclick="showFriendList()"></i>
	// </div>
	// <div class="nav-item dropdown">
	// 	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v text-white"></i></a>
	// 	<div class="dropdown-menu dropdown-menu-right">
	// 		<a class="dropdown-item" href="#" onclick="showGroupList()">View Groups</a>
	// 		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#create-group-modal">Create Group</a>
	// 		<a class="dropdown-item ${user.user_type == 0 ? "d-none" : ""}" href="#" id="broadcast-modal-toggle" data-toggle="modal" data-target="#broadcast-modal">Broadcast Message</a>
	// 		<form method='POST'>
	// 			<input type="submit" class="dropdown-item" name="submit" id="submit" value="Log Out">
	// 		</form>
	// 	</div>
	// </div>
	// `;

	DOM.chatListNavbar.innerHTML = `
		<img alt="Profile Photo" class="img-fluid rounded-circle mr-3" style="height:60px; width:60px; cursor:pointer; object-fit: cover;" onclick="showProfileSettings()" id="display-pic" src="${user.pic}">
		<div class="w-50">
			<div class="font-weight-bold" id="username" style="text-transform: capitalize;">${user.name}</div>
			<div id="connect-status"></div>
			<div id="status-text" class="font-weight-bold" style="font-size: 12px;"></div>
		</div>
		<div class="nav-item dropdown ml-auto">
			<img src="../../assets/img/icons/New-Message-TCX.png" onclick="showFriendList()" height="30px">
		</div>
		<div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle p-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<img src="../../assets/img/icons/More.png" height="30px">
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="#" onclick="showGroupList()">View Groups</a>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#create-group-modal">Create Group</a>
				<a class="dropdown-item ${user.user_type == 0 ? "d-none" : ""}" href="#" id="broadcast-modal-toggle" onclick="showNormalBCModal();">Broadcast Message</a>
				<form method='POST'>
					<input type="submit" class="dropdown-item" name="submit" id="submit" value="Log Out">
				</form>
			</div>
		</div>
	`;

	init();
};

let showComplaintHistory = () => {
	DOM.complaintHistory.style.left = 0;
	DOM.complaintHistory.innerHTML = "";
	mClassList(DOM.chatList).add("d-none");
	mClassList(DOM.complaintHistory).remove("d-none");
	DOM.chatListNavbar.innerHTML = `
	<i class="fas fa-arrow-left p-2 mx-3 my-1" style="font-size: 1.5rem; cursor: pointer;" onclick="hideComplaintHistory()"></i>
						<div class="font-weight-bold">Contact Center History</div>
	`;

	complaint_history
		.sort((a, b) => {
			let fa = new Date(a.start_handling).getTime();
			let fb = new Date(b.start_handling).getTime();

			// if (fa < fb) {
			// 	return -1;
			// }
			// if (fa > fb) {
			// 	return 1;
			// }
			// return 0;
			return fb - fa;
		})
		.forEach((elem, index) => {
			let complaint_date = new Date(elem.start_handling);

			let dualize = (x) => (x < 10 ? "0" + x : x);

			DOM.complaintHistory.innerHTML += `
		<div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" onclick="generateComplaintHistoryMessages(this, '${elem.id}')">
			<img src="/chatcore/assets/img/document.png" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
			<div class="w-50 name-last-message">
				<div class="name"><strong>${contactList.find((el) => el.id === elem.cust_id).name}</strong></div>
				<div class="small last-message">${elem.id}</div>
			</div>
			<div class="flex-grow-1 text-right">
				<div class="small time">${
          dualize(complaint_date.getDate()) + "/" + dualize(complaint_date.getMonth() + 1) + "/" + dualize(complaint_date.getFullYear()) + " " + dualize(complaint_date.getHours()) + ":" + dualize(complaint_date.getMinutes())
        }</div>
			</div>
		</div>
		`;
		});
};

let hideComplaintHistory = () => {
	DOM.complaintHistory.style.left = "-110%";

	mClassList(DOM.chatList).remove("d-none");
	mClassList(DOM.complaintHistory).add("d-none");
	DOM.complaintHistory.innerHTML = "";

	// DOM.chatListNavbar.innerHTML =
	// 	`
	// <img onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px; cursor:pointer;" onclick="showProfileSettings()" id="display-pic" src="` +
	// 	user.pic +
	// 	`">
	// <div class="w-50">
	// 	<div class="text-white font-weight-bold" id="username">` +
	// 	user.name +
	// 	`</div>
	// 	<div id="connect-status"></div>
	// 	<div class="text-white" id="status-text"></div>
	// </div>
	// <div class="nav-item dropdown ml-auto">
	// 	<i class="fa fa-users text-white" onclick="showFriendList()"></i>
	// </div>
	// <div class="nav-item dropdown">
	// 	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v text-white"></i></a>
	// 	<div class="dropdown-menu dropdown-menu-right">
	// 		<a class="dropdown-item" href="#" onclick="showGroupList()">View Groups</a>
	// 		<a class="dropdown-item ${user.user_type == 0 ? "d-none" : ""}" href="#" id="broadcast-modal-toggle" data-toggle="modal" data-target="#broadcast-modal">Broadcast Message</a>
	// 		<form method='POST'>
	// 			<input type="submit" class="dropdown-item" name="submit" id="submit" value="Log Out">
	// 		</form>
	// 	</div>
	// </div>
	// `;

	DOM.chatListNavbar.innerHTML = `
		<img alt="Profile Photo" class="img-fluid rounded-circle mr-3" style="height:60px; width:60px; cursor:pointer; object-fit: cover;" onclick="showProfileSettings()" id="display-pic" src="${user.pic}">
		<div class="w-50">
			<div class="font-weight-bold" id="username" style="text-transform: capitalize;">${user.name}</div>
			<div id="connect-status"></div>
			<div id="status-text" class="font-weight-bold" style="font-size: 12px;"></div>
		</div>
		<div class="nav-item dropdown ml-auto">
			<img src="../../assets/img/icons/New-Message-TCX.png" onclick="showFriendList()" height="30px">
		</div>
		<div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle p-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<img src="../../assets/img/icons/More.png" height="30px">
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="#" onclick="showGroupList()">View Groups</a>
				<a class="dropdown-item ${user.user_type == 0 ? "d-none" : ""}" href="#" id="broadcast-modal-toggle" onclick="showNormalBCModal();">Broadcast Message</a>
				<form method='POST'>
					<input type="submit" class="dropdown-item" name="submit" id="submit" value="Log Out">
				</form>
			</div>
		</div>
	`;

	init();
};

let isShowingComplaintHistory = false;

let generateComplaintHistoryMessages = (elem, complaint_id) => {
	let customer_fpin = complaint_history.find((elem) => elem.id === complaint_id).cust_id;

	isShowingComplaintHistory = true;
	isCallCenterEditor = false;

	let customer = contactList.find((elem) => elem.id === customer_fpin);

	chat = {
		contact: contactList.find((xyz) => xyz.id === customer_fpin),
		isGroup: false,
		unread: 0,
		name: customer.name,
		block: "0",
		is_complain: 1,
		msg: null,
		isViewHistory: true,
	};
	mClassList(DOM.finishComplain).add("d-none");

	mClassList(DOM.openAttach).add("d-none");
	mClassList(DOM.openAttach).remove("d-block");

	mClassList(DOM.inputArea).add("d-none");
	DOM.messageAreaDetails.innerHTML = "";

	mClassList(DOM.ccBar).contains("d-none", (elem) => elem.remove("d-none").add("d-flex"));

	// mClassList(DOM.inputArea).contains("d-none", (elem) => elem.remove("d-none").add("d-flex"));
	mClassList(DOM.messageAreaOverlay).add("d-none");

	mClassList(DOM.chatList).add("d-none");

	[...DOM.chatListItem].forEach((elem) => mClassList(elem).remove("active"));

	mClassList(elem).contains("unread", () => {
		MessageUtils.changeStatusById({
			isGroup: chat.isGroup,
			id: chat.isGroup ? chat.group.id : chat.contact.id,
		});
		mClassList(elem).remove("unread");
		mClassList(elem.querySelector("#unread-count")).add("d-none");
	});

	if (window.innerWidth <= 575) {
		mClassList(DOM.chatListArea).remove("d-flex").add("d-none");
		mClassList(DOM.messageArea).remove("d-none").add("d-flex");
		areaSwapped = true;
	} else {
		mClassList(elem).add("active");
	}

	DOM.messageAreaName.innerHTML = customer.name;
	DOM.messageAreaPic.src = customer.pic;

	let msgs = msgs_complaint.filter((elem) => elem.complainID === complaint_id);

	DOM.messages.innerHTML = "";

	lastDate = "";
	msgs.sort((a, b) => mDate(a.time).subtract(b.time)).forEach((msg) => addMessageToMessageArea(msg));
};

let updateFriendList = () => {
	if (isFriendListOpen) {
		DOM.friendList.innerHTML = "";
		contactList
			.sort((a, b) => {
				let fa = a.name.toLowerCase();
				let fb = b.name.toLowerCase();

				if (fa < fb) {
					return -1;
				}
				if (fa > fb) {
					return 1;
				}
				return 0;
			})
			.forEach((elem, index) => {
				if (elem.id !== localStorage.F_PIN) {
					// exclude self from friend list view, for arr = friend list
					DOM.friendList.innerHTML += `
					<div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" onclick="generateMessageArea(this, '${elem.id}', true, false)">
						<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
						<div class="w-50 name-last-message">
							<div class="name">${elem.name}</div>
						</div>
					</div>
					`;
				}
			});
	}
};

let showGroupList = () => {
	DOM.groupList.style.left = 0;
	DOM.groupList.innerHTML = "";
	mClassList(DOM.chatList).add("d-none");
	mClassList(DOM.groupList).remove("d-none");
	isGroupListOpen = true;
	DOM.chatListNavbar.innerHTML = `
	<i class="fas fa-arrow-left p-2 mx-3 my-1" style="font-size: 1.5rem; cursor: pointer;" onclick="hideGroupList()"></i>
						<div class=" font-weight-bold">New chat</div>
	`;

	groupList
		.sort((a, b) => {
			let fa = a.id.toLowerCase();
			let fb = b.id.toLowerCase();

			if (fa < fb) {
				return -1;
			}
			if (fa > fb) {
				return 1;
			}
			return 0;
		})
		.forEach((elem, index) => {
			if (elem.parent === "") {
				DOM.groupList.innerHTML += `
				<div id="accordion-groupList-${elem.id}" style="width:100%;">
					<div class="card" style="background-color: #f7f7f7">
						<div class="card-header" id="groupList-${elem.id}">
							<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom collapsed" data-toggle="collapse" data-target="#topic-groupList-${elem.id}" aria-expanded="false" aria-controls="topic-groupList-${elem.id}">
								<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
								<div class="w-50 name-last-message">
									<div class="name">${elem.name}</div>
									<div class="small last-message">${elem.quote != null ? elem.quote : ""}</div>
								</div>
								<div class="w-50 align-self-center">
									<i class="fas fa-chevron-up" style="float:right"></i>
								</div>
							</div>
						</div>
						<div id="topic-groupList-${elem.id}" class="collapse" aria-labelledby="groupList-${elem.id}" data-parent="#accordion-groupList-${elem.id}">
							<div class="card-body">
								<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom" onclick="generateMessageArea(this, '${elem.id}', true, true)">
									<img src="/chatcore/assets/img/forum.png" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
									<div class="w-50 align-self-center">
										<div class="name">Lounge</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				`;
			} else {
				// // console.log(elem);
				let htmlContent = `
				<div id="accordion-groupList-${elem.id}" style="width:100%;">
					<div class="card" style="background-color: #f7f7f7">
						<div class="card-header" id="groupList-${elem.id}">
							<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom collapsed" data-toggle="collapse" data-target="#topic-groupList-${elem.id}" aria-expanded="false" aria-controls="topic-groupList-${elem.id}">
								<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
								<div class="w-50 name-last-message">
									<div class="name">${elem.name}</div>
									<div class="small last-message">${elem.quote != null ? elem.quote : ""}</div>
								</div>
								<div class="w-50 align-self-center">
									<i class="fas fa-chevron-up" style="float:right"></i>
								</div>
							</div>
						</div>
						<div id="topic-groupList-${elem.id}" class="collapse" aria-labelledby="groupList-${elem.id}" data-parent="#accordion-groupList-${elem.id}">
							<div class="card-body">
								<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom" onclick="generateMessageArea(this, '${elem.id}', true, true)">
									<img src="/chatcore/assets/img/forum.png" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
									<div class="w-50 name-last-message">
										<div class="name">Lounge</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				`;

				setTimeout(function () {
					document
						.getElementById("topic-groupList-" + elem.parent)
						.getElementsByClassName("card-body")[0]
						.insertAdjacentHTML("beforeend", htmlContent);
				}, 100);
			}

			let isTopicExist = topicList.filter((topic) => topic.group_id === elem.id);

			if (isTopicExist.length > 0) {
				isTopicExist
					.sort((a, b) => {
						let fa = a.name.toLowerCase();
						let fb = b.name.toLowerCase();

						if (fa < fb) {
							return -1;
						}
						if (fa > fb) {
							return 1;
						}
						return 0;
					})
					.forEach((elem, index) => {
						let htmlContent = `<div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" onclick="generateMessageArea(this, '${elem.id}', true, true)">
							<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
							<div class="w-50  name-last-message">
								<div class="name">${elem.title}</div>
							</div>
						</div>`;

						setTimeout(function () {
							document
								.getElementById("topic-groupList-" + elem.group_id)
								.getElementsByClassName("card-body")[0]
								.insertAdjacentHTML("beforeend", htmlContent);
						}, 100);
					});
			}
		});
};
let hideGroupList = () => {
	DOM.groupList.style.left = "-110%";

	isGroupListOpen = false;

	mClassList(DOM.chatList).remove("d-none");
	mClassList(DOM.groupList).add("d-none");
	DOM.groupList.innerHTML = "";

	// DOM.chatListNavbar.innerHTML =
	// 	`
	// <img onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px; cursor:pointer;" onclick="showProfileSettings()" id="display-pic" src="` +
	// 	user.pic +
	// 	`">
	// <div class="w-50">
	// 	<div class="text-white font-weight-bold" id="username">` +
	// 	user.name +
	// 	`</div>
	// 	<div id="connect-status"></div>
	// 	<div class="text-white" id="status-text"></div>
	// </div>
	// <div class="nav-item dropdown ml-auto">
	// 	<i class="fa fa-users text-white" onclick="showFriendList()"></i>
	// </div>
	// <div class="nav-item dropdown">
	// 	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v text-white"></i></a>
	// 	<div class="dropdown-menu dropdown-menu-right">
	// 		<a class="dropdown-item" href="#" onclick="showGroupList()">View Groups</a>
	// 		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#create-group-modal">Create Group</a>
	// 		<a class="dropdown-item ${user.user_type == 0 ? "d-none" : ""}" href="#" id="broadcast-modal-toggle" data-toggle="modal" data-target="#broadcast-modal">Broadcast Message</a>
	// 		<form method='POST'>
	// 			<input type="submit" class="dropdown-item" name="submit" id="submit" value="Log Out">
	// 		</form>
	// 	</div>
	// </div>
	// `;

	DOM.chatListNavbar.innerHTML = `
		<img alt="Profile Photo" class="img-fluid rounded-circle mr-3" style="height:60px; width:60px; cursor:pointer; object-fit: cover;" onclick="showProfileSettings()" id="display-pic" src="${user.pic}">
		<div class="w-50">
			<div class="font-weight-bold" id="username" style="text-transform: capitalize;">${user.name}</div>
			<div id="connect-status"></div>
			<div id="status-text" class="font-weight-bold" style="font-size: 12px;"></div>
		</div>
		<div class="nav-item dropdown ml-auto">
			<img src="../../assets/img/icons/New-Message-TCX.png" onclick="showFriendList()" height="30px">
		</div>
		<div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle p-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<img src="../../assets/img/icons/More.png" height="30px">
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="#" onclick="showGroupList()">View Groups</a>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#create-group-modal">Create Group</a>
				<a class="dropdown-item ${user.user_type == 0 ? "d-none" : ""}" href="#" id="broadcast-modal-toggle" onclick="showNormalBCModal();">Broadcast Message</a>
				<form method='POST'>
					<input type="submit" class="dropdown-item" name="submit" id="submit" value="Log Out">
				</form>
			</div>
		</div>
	`;

	init();
};

let updateGroupList = () => {
	if (isGroupListOpen) {
		DOM.groupList.innerHTML = "";
		groupList
			.sort((a, b) => {
				let fa = a.name.toLowerCase();
				let fb = b.name.toLowerCase();

				if (fa < fb) {
					return -1;
				}
				if (fa > fb) {
					return 1;
				}
				return 0;
			})
			.forEach((elem, index) => {
				if (elem.parent === "") {
					DOM.groupList.innerHTML += `
					<div id="accordion-groupList-${elem.id}" style="width:100%;">
						<div class="card" style="background-color: #f7f7f7">
							<div class="card-header" id="groupList-${elem.id}">
								<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom" data-toggle="collapse" data-target="#topic-groupList-${elem.id}" aria-expanded="true" aria-controls="topic-groupList-${elem.id}">
									<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
									<div class="w-50 name-last-message">
										<div class="name">${elem.name}</div>
									</div>
									<div class="w-50 align-self-center">
										<i class="fas fa-chevron-up" style="float:right"></i>
									</div>
								</div>
							</div>
							<div id="topic-groupList-${elem.id}" class="collapse show" aria-labelledby="groupList-${elem.id}" data-parent="#accordion-groupList-${elem.id}">
								<div class="card-body">
									<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom" onclick="generateMessageArea(this, '${elem.id}', true, true)">
										<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
										<div class="w-50 name-last-message">
											<div class="name">Lounge</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					`;
				} else {
					let htmlContent = `
					<div id="accordion-groupList-${elem.id}" style="width:100%;">
						<div class="card" style="background-color: #f7f7f7">
							<div class="card-header" id="groupList-${elem.id}">
								<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom" data-toggle="collapse" data-target="#topic-groupList-${elem.id}" aria-expanded="true" aria-controls="topic-groupList-${elem.id}">
									<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
									<div class="w-50 name-last-message">
										<div class="name">${elem.name}</div>
									</div>
									<div class="w-50 name-last-message">
										<i class="fas fa-chevron-up" style="float:right"></i>
									</div>
								</div>
							</div>
							<div id="topic-groupList-${elem.id}" class="collapse show" aria-labelledby="groupList-${elem.id}" data-parent="#accordion-groupList-${elem.id}">
								<div class="card-body">
									<div class="chat-list-item d-flex flex-row w-100 p-4 bg-lightgray border-bottom" onclick="generateMessageArea(this, '${elem.id}', true, true)">
										<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
										<div class="w-50 name-last-message">
											<div class="name">Lounge</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					`;

					setTimeout(function () {
						document
							.getElementById("topic-groupList-" + elem.parent)
							.getElementsByClassName("card-body")[0]
							.insertAdjacentHTML("beforeend", htmlContent);
					}, 100);
				}

				let isTopicExist = topicList.filter((topic) => topic.group_id === elem.id);

				if (isTopicExist.length > 0) {
					isTopicExist
						.sort((a, b) => {
							let fa = a.name.toLowerCase();
							let fb = b.name.toLowerCase();

							if (fa < fb) {
								return -1;
							}
							if (fa > fb) {
								return 1;
							}
							return 0;
						})
						.forEach((elem, index) => {
							let htmlContent = `<div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" onclick="generateMessageArea(this, '${elem.id}', true, true)">
					<img src="${elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; width:50px;">
					<div class="w-50 name-last-message">
						<div class="name">${elem.title}</div>
					</div>
				</div>`;

							setTimeout(function () {
								document
									.getElementById("topic-groupList-" + elem.group_id)
									.getElementsByClassName("card-body")[0]
									.insertAdjacentHTML("beforeend", htmlContent);
							}, 100);
						});
				}
			});
	}
};

let showInfo = () => {
	DOM.messageArea.classList.remove("col-md-8");
	DOM.messageArea.classList.add("col-md-4");
	mClassList(DOM.infoArea).remove("d-none").add("d-flex");
	if (window.innerWidth <= 575) {
		mClassList(DOM.messageArea).remove("d-flex").add("d-none");
	}
	DOM.infoArea.style.left = 0;

	if (chat != null) {
		if (!chat.isGroup) {
			DOM.personGroup.innerHTML = "Contact Info";
			DOM.personProfPic.src = chat.contact.pic;
			DOM.personName.value = chat.contact.name;
			// DOM.personAbout.value = contact.about;
			DOM.membersSection.innerHTML = "";
			// let badge = '';
			// staff.push(elem.contact.isStaff);
			if (chat.contact.id == localStorage.cc_alias_fpin) {
				// is company account
				DOM.personLabel.innerHTML = '<i class="fas fa-check-circle" style="color:#306EFF;"></i> Official';
			} else if (chat.contact.isStaff == "1") {
				DOM.personLabel.innerHTML = '<i class="fas fa-user"></i> Contact Center';
			} else if (chat.contact.user_type == 23) {
				DOM.personLabel.innerHTML = '<i class="fas fa-check-circle" style="color:red;"></i> Admin';
			}
		} else {
			DOM.personGroup.innerHTML = "Group Info";
			DOM.personProfPic.src = chat.group.pic;
			DOM.personAbout.value = chat.group.quote;
			if (typeof chat.group.name === "undefined") {
				DOM.personName.value = groupList.find((grp) => grp.id === chat.group.group_id).name;
			} else {
				DOM.personName.value = chat.group.name;
			}

			DOM.personProfPic.addEventListener("click", (e) => {
				if (chat.group.created_by == user.id) {
					DOM.editGroupPic.click();
				}
			});

			// check group creator
			if (chat.group.created_by == localStorage.F_PIN) {
				mClassList(DOM.addGroupMember).remove("d-none");
				DOM.personName.removeAttribute("disabled");
				DOM.personAbout.removeAttribute("disabled");
				mClassList(DOM.saveGroupInfo).remove("d-none");
			} else {
				mClassList(DOM.addGroupMember).add("d-none");
				DOM.personName.setAttribute("disabled", true);
				DOM.personAbout.setAttribute("disabled", true);
				mClassList(DOM.saveGroupInfo).add("d-none");
			}

			mClassList(DOM.membersSection).remove("d-none");

			DOM.membersSection.innerHTML = "";

			groupMembers
				// .sort((a, b) => {
				// 	let fa = a.name.toLowerCase();
				// 	let fb = b.name.toLowerCase();

				// 	if (fa < fb) {
				// 		return -1;
				// 	}
				// 	if (fa > fb) {
				// 		return 1;
				// 	}
				// 	return 0;
				// })
				.forEach((elem, index) => {
					if (elem.group_id == chat.group.id) {
						console.log(elem);
						DOM.membersSection.innerHTML += `
						<div id="groupMember-${elem.f_pin}" class="chat-list-item d-flex flex-row w-100 p-2 border-bottom" ${elem.f_pin != user.id ? "onclick=\"contactInfo('" + elem.f_pin + "')\"" : ""}>
							<img src="${elem.f_pin == user.id ? user.pic : elem.pic}" onerror="this.src='https://pngimage.net/wp-content/uploads/2018/06/grey-circle-png-1.png'" alt="Profile Photo" class="img-fluid rounded-circle mr-2 member-pp" style="height:50px; width:50px;">
							<div class="w-50 name-last-message">
								<div class="name">${elem.f_pin == user.id ? user.name.trim() : elem.name.trim()}</div>
								<div class="small last-message">${elem.quote === null ? "" : elem.quote}</div>
							</div>
							<div class="w-50">	
								${elem.position == 1 ? '<img src="/chatcore/assets/img/pb_twsn_group_admin_11.png" style="float:right; height: 1.5rem; width:auto;">' : ""}
							</div>
						</div>
						`;
					}
				});
		}
	}
};

DOM.saveGroupInfo.addEventListener("click", (e) => {
	let groupName = DOM.personName.value;
	let groupDesc = DOM.personAbout.value;

	let formData = new FormData();
	formData.append("from", user.id);
	formData.append("group_id", chat.group.id);
	formData.append("group_name", groupName);
	formData.append("description", groupDesc);
	if (DOM.editGroupPic.files.length > 0) {
		let groupPic = DOM.editGroupPic.files[0];
		hex = Date.now().toString(16);
		let thumb_id = user.id + "-" + hex + "." + getExtension(groupPic.name);
		formData.append("thumb_id", thumb_id);
		formData.append("file", groupPic, groupPic.name);
		formData.append("hex", hex);
	}

	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			data = JSON.parse(xmlHttp.responseText);

			console.log(data);
			alert("Group info changed.");
		}
	};
	xmlHttp.open("post", "/chatcore/logics/save_group_info");
	xmlHttp.send(formData);
});

DOM.submitCreateGroup.addEventListener("click", (e) => {
	let groupName = DOM.createGroupName.value;

	let formData = new FormData();
	formData.append("from", user.id);
	formData.append("group_name", groupName);

	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// close create group input
			$("#create-group-modal").modal("toggle");

			// pop create group result
			$("#create-group-result").modal("toggle");
			DOM.createGroupResultText.innerHTML = xmlHttp.responseText;
		}
	};
	xmlHttp.open("post", "/chatcore/logics/submit_create_group");
	xmlHttp.send(formData);
});

DOM.submitCreateTopic.addEventListener("click", (e) => {
	let topicName = DOM.createTopicName.value;

	let formData = new FormData();
	formData.append("from", user.id);
	formData.append("group_id", chat.group.id);
	formData.append("topic_name", topicName);

	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// close create group input
			$("#create-topic-modal").modal("toggle");

			// pop create group result
			$("#create-topic-result").modal("toggle");
			DOM.createTopicResultText.innerHTML = xmlHttp.responseText;
		}
	};
	xmlHttp.open("post", "/chatcore/logics/submit_create_topic");
	xmlHttp.send(formData);
});

let hideInfo = () => {
	DOM.infoArea.style.left = "110%";
	mClassList(DOM.infoArea).remove("d-flex").add("d-none");
	if (window.innerWidth <= 575) {
		mClassList(DOM.messageArea).remove("d-none").add("d-flex");
	}
	DOM.personLabel.innerHTML = "";
	DOM.messageArea.classList.remove("col-md-4");
	DOM.messageArea.classList.add("col-md-8");
};

window.addEventListener("resize", (e) => {
	if (window.innerWidth > 575) showChatList();
	document.getElementById("wrap-all").style.top = "50%";
});

let executed = false;

let loadingMsgArea = `
<div class="container-fluid">
	<div class="row my-5">
		<div class="col-md-12 text-center">
			<strong>Loading ongoing contact center session...</strong>
			<div class="profile-main-loader">
				<div class="loader">
					<svg class="circular-loader"viewBox="25 25 50 50" >
					<circle class="loader-path" cx="50" cy="50" r="20" fill="none" stroke="#01686d" stroke-width="2" />
					</svg>
				</div>
			</div>
		</div>
	</div>
</div>
`;

let emptyMsgArea = `
<div class="container-fluid">
	<div class="row my-5">
		<div class="col-md-12 text-center justify-content-center">
			<span class="font-medium text-lightgray" style="font-size: 12px;">Start a new conversation...</span>
		</div>
	</div>
</div>
`;

let emptyMsgAreaLoading = `
<div class="container-fluid">
	<div class="row my-5">
		<div class="col-md-12 text-center">
			<strong>Loading...</strong>
			<div class="profile-main-loader">
				<div class="loader">
					<svg class="circular-loader"viewBox="25 25 50 50" >
					<circle class="loader-path" cx="50" cy="50" r="20" fill="none" stroke="#01686d" stroke-width="2" />
					</svg>
				</div>
			</div>
		</div>
	</div>
</div>
`;

if (chat == null) {
	$("#message-area .overlay").html(emptyMsgAreaLoading);
}

let checkOngoingComplaint = () => {
	if (chat == null) {
		if (ongoingComplaint && Object.keys(ongoingComplaint).length > 0) {
			console.log("ongoing");
			console.log(user);
			$("#message-area .overlay").html(loadingMsgArea);
			if (user.user_type != 24) {
				// if not staff
				console.log("customer");
				console.log(document.getElementById(ongoingComplaint.officer_id));
				document.getElementById(ongoingComplaint.officer_id).click();
			} else {
				// if officer
				console.log("officer");
				document.getElementById(ongoingComplaint.cust_id).click();
			}
			isOngoingCC = true;
		} else {
			$("#message-area .overlay").html(emptyMsgArea);
		}
	}
};

let formList = [];

let fetchFormList = () => {
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// get friends lpins
			formList = JSON.parse(xmlHttp.responseText);

		}
	};
	xmlHttp.open("get", "/chatcore/logics/fill_form_list?company_fpin=" + localStorage.cc_alias_fpin);
	xmlHttp.send();
}

let init = () => {
	DOM.username.innerHTML = user.name;
	DOM.displayPic.src = user.pic;
	DOM.profilePic.src = user.pic;
	DOM.profilePic.addEventListener("click", () => DOM.profilePicInput.click());
	// DOM.profilePicInput.addEventListener("change", () => // console.log(DOM.profilePicInput.files[0]));
	DOM.inputName.addEventListener("blur", (e) => (user.name = e.target.value));

	// if (chat.contact.id == localStorage.cc_alias_fpin) { // is company account
	// 	DOM.personLabel.innerHTML = '<i class="fas fa-check-circle" style="color:#306EFF;"></i> Official';
	// } else if (chat.contact.isStaff == '1') {
	// 	DOM.personLabel.innerHTML = '<i class="fas fa-user"></i> Call Center';
	// } else if (chat.contact.user_type == 23) {
	// 	DOM.personLabel.innerHTML = '<i class="fas fa-check-circle" style="color:red;"></i> Admin';
	// }

	if (localStorage.getItem("user_type") == "staff") {
		DOM.personType.innerHTML = `<i class="fas fa-user"></i> Contact Center`;
	} else if (user.user_type == 23) {
		DOM.personType.innerHTML = `<i class="fas fa-check-circle" style="color:red;"></i> Admin`;
	} else if (user.user_type == 0) {
		DOM.personType.innerHTML = "";
	} else if (user.id == localStorage.cc_alias_fpin) {
		// is company account
		DOM.personLabel.innerHTML = '<i class="fas fa-check-circle" style="color:#306EFF;"></i> Official';
	}

	fetchCompanyAlias();

	if (executed === false) {
		if (user.user_type == 0) {
			mClassList(DOM.broadcastModalToggle).add("d-none");
		}
		// appendUserType();
		// fetchReadMessages();

		var xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				// get friends lpins
				data = JSON.parse(xmlHttp.responseText);
				console.log(data);

				// loop through every friends lpin
				for (const d of data) {
					let msgIndex = messages.findIndex((el) => el.id === d.MESSAGE);
					if (messages[msgIndex]) {
						messages[msgIndex].status = d.STATUS;
						messages[msgIndex].L_PIN = d.L_PIN;
					} else {
						console.log(d.MESSAGE);
					}
				}
				generateChatList();
			}
		};
		xmlHttp.open("get", "/chatcore/logics/fetch_read_messages?f_pin=" + localStorage.F_PIN + "&flag= " + localStorage.FLAG);
		xmlHttp.send();
		// generateChatList();
		// console.log("masuk sini nggak?");
		fillGroupDataList();
		fillParticipantDataList();
		fetchFormList();
		checkOngoingComplaint();
		executed = true;
	}

	// // // console.log("Click the Image at top-left to open settings.");
};

DOM.removeMediaNotif.addEventListener("click", function (e) {
	DOM.documentPop.classList.add("d-none");
	DOM.fileInput.value = "";
	hasFile = false;
	isReply = undefined;
	replyTo = undefined;
});

let fillFormList = () => {
	let temp = formList;

	let formSelect = DOM.broadcastSurvey;

	temp.forEach(x => {
		let opt = document.createElement('option');
		opt.value = x.FORM_ID;
		opt.innerHTML = x.TITLE;
		formSelect.appendChild(opt);
	})
	console.log(temp);
	// $("#broadcast-survey").autocomplete({
	// 	source: temp,
	// 	select: function (event, ui) {
	// 		DOM.broadcastSurvey.value = ui.item.value;
	// 	},
	// 	appendTo: "#form-broadcast-survey",
	// });
}

	// DOM.broadcastModalToggle.addEventListener("click", () => {
	// 	localStorage.removeItem("ss_choice");

	// 	console.log('normal broadcast');

	// 	DOM.targetGroupList.innerHTML = "";
	// 	DOM.participantList.innerHTML = "";

		
	// 	$("#exampleModalLabel").text("Broadcast Message");
	// 	// $("#exampleModalLabel").text("Video Conference Room");

	// 	$("#form-target-audience").removeClass("d-none");
	// 	$("#form-participants").addClass("d-none");
	// 	$("#form-broadcast-type").removeClass("d-none");
	// 	$("#form-broadcast-msg").removeClass("d-none");
	// 	$("#form-broadcast-mode").removeClass("d-none");

	// 	$("#submit-broadcast").text("Create");

	// 	$("#form-start-date").removeClass("d-none");
	// 	$("#form-broadcast-file").removeClass("d-none");
	// 	$("#form-broadcast-link").removeClass("d-none");
	// 	$("#form-broadcast-survey").removeClass("d-none");
	// 	fillGroupDataList();
	// 	fillParticipantDataList();
	// 	fillFormList();

	// 	let now = new Date();

	// 	let day = ("0" + now.getDate()).slice(-2);
	// 	let month = ("0" + (now.getMonth() + 1)).slice(-2);

	// 	let today = now.getFullYear() + "-" + month + "-" + day;

	// 	let hour = ("0" + now.getHours()).slice(-2);
	// 	let min = ("0" + now.getMinutes()).slice(-2);

	// 	let time = hour + ":" + min;

	// 	DOM.broadcastStartDate.value = today;
	// 	startDateTimeStr = today + " " + time;
	// 	DOM.broadcastStartTime.value = time;

	// 	$("#broadcast-modal").modal("show");

	// 	// $("#submit-broadcast").text("Create");
	// });

function showNormalBCModal() {
	localStorage.removeItem("ss_choice");

	console.log('normal broadcast');

	DOM.targetGroupList.innerHTML = "";
	DOM.participantList.innerHTML = "";	

	let now = new Date();

	let day = ("0" + now.getDate()).slice(-2);
	let month = ("0" + (now.getMonth() + 1)).slice(-2);

	let today = now.getFullYear() + "-" + month + "-" + day;

	let hour = ("0" + now.getHours()).slice(-2);
	let min = ("0" + now.getMinutes()).slice(-2);

	let time = hour + ":" + min;

	DOM.broadcastStartDate.value = today;
	startDateTimeStr = today + " " + time;
	DOM.broadcastStartTime.value = time;
	
	$("#exampleModalLabel").text("Broadcast Message");
	// $("#exampleModalLabel").text("Video Conference Room");

	$("#form-target-audience").removeClass("d-none");
	$("#form-participants").addClass("d-none");
	$("#form-broadcast-type").removeClass("d-none");
	$("#form-broadcast-msg").removeClass("d-none");
	$("#form-broadcast-mode").removeClass("d-none");

	$("#submit-broadcast").text("Create");

	$("#form-start-date").removeClass("d-none");
	$("#form-broadcast-file").removeClass("d-none");
	$("#form-broadcast-link").removeClass("d-none");
	$("#form-broadcast-survey").removeClass("d-none");
	fillGroupDataList();
	fillParticipantDataList();
	fillFormList();

	$("#broadcast-modal").modal("show");
}

$('#broadcast-modal').on('hidden.bs.modal', function(){
	localStorage.removeItem('ss_choice');
}) 

DOM.broadcastTarget.addEventListener("change", (e) => {
	if (e.target.value === "4") {
		mClassList(DOM.formTargetGroup).remove("d-none");
		mClassList(DOM.formParticipants).add("d-none");
		// fillGroupDataList();
	} else if (e.target.value === "5") {
		mClassList(DOM.formTargetGroup).add("d-none");
		mClassList(DOM.formParticipants).remove("d-none");
		// fillParticipantDataList();
	} else {
		mClassList(DOM.formTargetGroup).add("d-none");
		mClassList(DOM.formParticipants).add("d-none");
	}
});

DOM.broadcastMode.addEventListener("change", (e) => {
	if (e.target.value !== "1") {
		mClassList(DOM.formEndDate).remove("d-none");
	} else {
		mClassList(DOM.formEndDate).add("d-none");
	}
});

let fillGroupDataList = () => {
	groupList
		.sort((a, b) => {
			let fa = a.name.toLowerCase();
			let fb = b.name.toLowerCase();

			if (fa < fb) {
				return -1;
			}
			if (fa > fb) {
				return 1;
			}
			return 0;
		})
		.forEach((elem, index) => {
			if (elem.name !== "Customer Service" || elem.name !== "Internal") {
				let option = document.createElement("option");
				option.value = elem.id;
				option.innerHTML = elem.name;
				DOM.targetGroupList.appendChild(option);
			}
		});
};

let fillParticipantDataList = () => {
	let participantListOption = [];
	contactList
		.sort((a, b) => {
			let fa = a.name.toLowerCase();
			let fb = b.name.toLowerCase();

			if (fa < fb) {
				return -1;
			}
			if (fa > fb) {
				return 1;
			}
			return 0;
		})
		.forEach((elem, index) => {
			if (elem.id != "-999" && elem.id != user.id) {
				// let option = document.createElement('option');
				// option.value = elem.name.trim();
				// // option.innerHTML = elem.name.trim();
				// DOM.participantList.appendChild(option);
				participantListOption.push(elem.name.trim());
			}
		});
	$("#participant-list").autocomplete({
		source: participantListOption,
		select: function (event, ui) {
			let fpin = contactList.find((el) => el.name.trim() === ui.item.value.trim()).id;
			selectedParticipant.push(fpin);
			// DOM.broadcastParticipants.value += contactList.find(el => el.id === e.target.value).name.trim() + ', ';
			DOM.broadcastParticipants.value += ui.item.value.trim() + ", ";
			// DOM.participantListDropdown.value = "";
		},
		appendTo: "#form-participants",
	});
};

let selectedGroup = [];
let selectedParticipant = [];

let startdatepart = "";
let starttimepart = "";
let startDateTimeStr = "";

let enddatepart = "";
let endtimepart = "";
let endDateTimeStr = "";

DOM.broadcastStartDate.addEventListener("change", (e) => {
	startdatepart = e.target.value;
	combineStartTime();
});

DOM.broadcastStartTime.addEventListener("change", (e) => {
	starttimepart = e.target.value;
	combineStartTime();
});

DOM.broadcastEndDate.addEventListener("change", (e) => {
	enddatepart = e.target.value;
	combineEndTime();
});

DOM.broadcastEndTime.addEventListener("change", (e) => {
	endtimepart = e.target.value;
	combineEndTime();
});

let combineStartTime = () => {
	// startDateTimeStr = '';
	let startDateTimeMillis = "";
	if (startdatepart.length > 0 && starttimepart.length > 0) {
		startDateTimeStr = startdatepart + " " + starttimepart;
	} else {
		startDateTimeStr = DOM.broadcastStartDate.value + " " + DOM.broadcastStartTime.value;
	}
	startDateTimeMillis = new Date(startDateTimeStr).getTime();
	return startDateTimeMillis;
	// // // console.log(new Date(startDateTimeStr).getTime().toString());
};

let combineEndTime = () => {
	endDateTimeStr = "";
	let endDateTimeMillis = "";
	if (enddatepart.length > 0 && endtimepart.length > 0) {
		endDateTimeStr = enddatepart + " " + endtimepart;
	} else {
		endDateTimeStr = DOM.broadcastEndDate.value + " " + DOM.broadcastEndTime.value;
	}
	endDateTimeMillis = new Date(endDateTimeStr).getTime();
	return endDateTimeMillis;
	// // // console.log(new Date(endDateTimeStr).getTime().toString());
};

// DOM.participantListDropdown.addEventListener('change', (e) => {

// 	let fpin = contactList.find(el => el.name.trim() === e.target.value).id;
// 	selectedParticipant.push(fpin);

// 	// DOM.broadcastParticipants.value += contactList.find(el => el.id === e.target.value).name.trim() + ', ';
// 	DOM.broadcastParticipants.value += e.target.value.trim() + ', ';
// 	DOM.participantListDropdown.value = "";
// });

DOM.targetGroupList.addEventListener("change", (e) => {
	selectedGroup.push(e.target.value);
	DOM.broadcastGroup.value += groupList.find((el) => el.id === e.target.value).name + ", ";
});

DOM.deleteParticipants.addEventListener("click", () => {
	selectedParticipant = [];
	DOM.broadcastParticipants.value = "";
});

DOM.deleteGroups.addEventListener("click", () => {
	selectedGroup = [];
	DOM.broadcastGroup.value = "";
});

DOM.broadcastFile.addEventListener("change", (e) => {
	if (DOM.broadcastFile.files[0].size > 25000000) {
		alert("File size is limited to 25MB");
		DOM.broadcastFile.value = "";
		return;
	}
});

// customer complain
var custfpin;

// let baseURL = 'http://192.168.0.56/';
let baseURL = "https://" + window.location.host;

function checkCustomProtocol(inProtocol, inTimeOut) {
	// var timeout = inTimeOut;
	// window.addEventListener("blur", function (e) {
	// 	window.clearTimeout(timeout);
	// });
	// timeout = window.setTimeout(function () {
	// 	// console.log('timeout');
	// 	// window.location = baseURL + "downloads/palio_installer.exe";
	// 	var iframe = document.createElement("iframe");
	// 	iframe.style.display = "none";
	// 	document.body.appendChild(iframe);
	// 	iframe.src = baseURL + "/downloads/palio_installer.exe";
	// }, inTimeOut);

	// window.location = inProtocol;

	window.location = inProtocol;

	$('#open-desktop').unbind();
	$('#download-desktop').modal('show');

	$('#open-desktop').click(function () {
		window.location = inProtocol;
	})
}

// checkCustomProtocol("palio:vcr", baseURL + "downloads/palio_installer.exe", 200)

let sendCallCCNotif = (userTo, ticketId, camOn) => {
	let today = new Date();
	let clickTime = today.getTime();
	let clickTimeString = new Date(clickTime);
	let milliseconds = today.getMilliseconds();
	console.log("sendCallCCNotif function called " + clickTimeString.toString() + " " + milliseconds.toString());

	let formData = new FormData();

	formData.append("from", user.id);
	formData.append("to", userTo);
	formData.append("complaint_id", ticketId);
	formData.append("channel", camOn);

	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			let today2 = new Date();
			let clickTime2 = today2.getTime();
			let clickTimeString2 = new Date(clickTime2);
			let milliseconds2 = today2.getMilliseconds();
			console.log("sendCallCCNotif function get response " + clickTimeString2.toString() + " " + milliseconds2.toString());
		}
	};

	// xmlHttp.open("POST", "/chatcore/logics/send_call_cc_notif");
	xmlHttp.open("POST", "/chatcore/logics/accept_request_start_call");
	xmlHttp.send(formData);
};

// acc complain
DOM.complainAcc.addEventListener("click", () => {
	let today = new Date();
	let clickTime = today.getTime();
	let clickTimeString = new Date(clickTime);
	let milliseconds = today.getMilliseconds();
	console.log("Accept Complain (I'll Handle) " + clickTimeString.toString() + " " + milliseconds.toString());

	mClassList(DOM.finishComplain).remove("d-none");

	if (localStorage.getItem("complain_channel") == "2") {
		// console.log('ccs: ' + localStorage.getItem('complainID'));
		let joinCommand = "palio:" + localStorage.getItem("api_key") + "+" + user.id + "+ccs+" + localStorage.getItem("complainID") + "+" + user.id + "+" + localStorage.complain + "+2";
		checkCustomProtocol(joinCommand, 200);

		let today2 = new Date();
		let clickTime2 = today2.getTime();
		let clickTimeString2 = new Date(clickTime2);
		let milliseconds2 = today2.getMilliseconds();
		console.log("Palio Desktop Run " + clickTimeString2.toString() + " " + milliseconds2.toString());

		let d = new Date();
		let time = d.getHours();
		let greeting = "";

		if (time > 5 && time < 12) {
			greeting = "Good morning ";
		}
		if (time > 12 && time < 17) {
			greeting = "Good afternoon ";
		}
		if (time > 17 && time < 0 || time > 0 && time < 5) {
			greeting = "Good evening ";
		}

		custfpin = localStorage.getItem("complain");
		let custName = contactList.find((el) => el.id === custfpin).name;
		let alias_name = contactList.find((el) => el.id === localStorage.cc_alias_fpin).name;
		let body = greeting + custName.trim() + ", thank you for contacting " + alias_name.trim() + " Contact Center. My name is " + user.name.trim() + ", how may I help you today?";
		let msg_id = localStorage.F_PIN + Date.now().toString();
		let msg = {
			id: msg_id,
			sender: localStorage.F_PIN,
			body: body,
			time: mDate().toString(),
			status: 1,
			recvId: localStorage.getItem("complain"),
			recvIsGroup: false,
			is_complain: 1,
		};

		sendMessageCCStart(msg);

		// sendCallCCNotif(localStorage.getItem('complain'), localStorage.getItem('complainID'), 1);
	} else if (localStorage.getItem("complain_channel") == "1") {
		// console.log('ccs: ' + localStorage.getItem('complainID'));
		let joinCommand = "palio:" + localStorage.getItem("api_key") + "+" + user.id + "+ccs+" + localStorage.getItem("complainID") + "+" + user.id + "+" + localStorage.complain + "+1";
		checkCustomProtocol(joinCommand, 200);
		// sendCallCCNotif(localStorage.getItem('complain'), localStorage.getItem('complainID'), 0);

		custfpin = localStorage.getItem("complain");
		let custName = contactList.find((el) => el.id === custfpin).name;
		let alias_name = contactList.find((el) => el.id === localStorage.cc_alias_fpin).name;
		let body = "Good Evening " + custName.trim() + ", thank you for contacting " + alias_name.trim() + " Contact Center. My name is " + user.name.trim() + ", how may I help you today?";
		let msg_id = localStorage.F_PIN + Date.now().toString();
		let msg = {
			id: msg_id,
			sender: localStorage.F_PIN,
			body: body,
			time: mDate().toString(),
			status: 1,
			recvId: localStorage.getItem("complain"),
			recvIsGroup: false,
			is_complain: 1,
		};

		sendMessageCCStart(msg);
	} else if (localStorage.getItem("complain_channel") == "0") {
		var xmlHttp = new XMLHttpRequest();
		custfpin = localStorage.getItem("complain");
		let custName = contactList.find((el) => el.id === custfpin).name;
		let tA = new Date().getTime();
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 0) {
				console.log("ACPTCC created");
			}
			if (xmlHttp.readyState == 1) {
				console.log("ACPTCC opened");
			}
			if (xmlHttp.readyState == 2) {
				console.log("ACPTCC sent");
			}
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				data = JSON.parse(xmlHttp.responseText);
				localStorage.setItem("complainID", data.data);

				let msg_id = localStorage.F_PIN + Date.now().toString();

				let tB = new Date().getTime();

				if (data.data != "") {
					let delay = new Date().getTime() - tA;
					console.log("ACPTCC response <- clicked" + delay);
				}

				hasFile = false;
				let alias_name = contactList.find((el) => el.id === localStorage.cc_alias_fpin).name;

				// let body = "";

				let body = "Good Evening " + custName.trim() + ", thank you for contacting " + alias_name.trim() + " Contact Center. My name is " + user.name.trim() + ", how may I help you today?";

				let msg = {
					id: msg_id,
					sender: localStorage.F_PIN,
					body: body,
					time: mDate().toString(),
					status: 1,
					// recvId: chat.isGroup ? chat.group.id : chat.contact.id,
					recvId: localStorage.getItem("complain"),
					recvIsGroup: false,
					is_complain: 1,
				};

				sendMessageCCStart(msg);

				// if (localStorage.getItem("complain_channel") == '2') {
				// 	// console.log('ccs: ' + localStorage.getItem('complainID'));
				// 	let joinCommand = 'palio:' + localStorage.getItem('api_key') + '+' + user.id + '+ccs+' + localStorage.getItem('complainID') + '+' + user.id + '+' + localStorage.complain + '+1';
				// 	checkCustomProtocol(joinCommand, 200);

				// } else if (localStorage.getItem("complain_channel") == '1') {
				// 	// console.log('ccs: ' + localStorage.getItem('complainID'));
				// 	let joinCommand = 'palio:' + localStorage.getItem('api_key') + '+' + user.id + '+ccs+' + localStorage.getItem('complainID') + '+' + user.id + '+' + localStorage.complain + '+0';
				// 	checkCustomProtocol(joinCommand, 200);
				// }
				// document.getElementById(custfpin).click();
				// isOngoingCC = true;
			}
		};
		xmlHttp.open("get", "/chatcore/logics/accept_complain?f_pin=" + localStorage.F_PIN + "&customer_fpin=" + localStorage.complain + "&ch=" + localStorage.getItem("complain_channel"));
		xmlHttp.send();
	}

	// // sendCallCCNotif(localStorage.getItem('complain'),)

	// // open xhr
	// var xmlHttp = new XMLHttpRequest();
	// custfpin = localStorage.getItem('complain');
	// let custName = contactList.find(el => el.id === custfpin).name;
	// let tA = new Date().getTime();
	// xmlHttp.onreadystatechange = function () {
	// 	if (xmlHttp.readyState == 0) {
	// 		console.log("ACPTCC created");
	// 	}
	// 	if (xmlHttp.readyState == 1) {
	// 		console.log("ACPTCC opened");
	// 	}
	// 	if (xmlHttp.readyState == 2) {
	// 		console.log("ACPTCC sent");
	// 	}
	// 	if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
	// 		data = JSON.parse(xmlHttp.responseText);
	// 		localStorage.setItem('complainID', data.data);

	// 		let msg_id = localStorage.F_PIN + Date.now().toString();

	// 		let tB = new Date().getTime();

	// 		if (data.data != "") {
	// 			let delay = new Date().getTime() - tA;
	// 			console.log("ACPTCC response <- clicked" + delay);
	// 		}

	// 		hasFile = false;
	// 		let alias_name = contactList.find(el => el.id === localStorage.cc_alias_fpin).name;

	// 		// let body = "";

	// 		let body = "Good Evening " + custName.trim() + ", thank you for contacting " + alias_name.trim() + " Contact Center. My name is " + user.name.trim() + ", how may I help you today?";

	// 		let msg = {
	// 			id: msg_id,
	// 			sender: localStorage.F_PIN,
	// 			body: body,
	// 			time: mDate().toString(),
	// 			status: 1,
	// 			// recvId: chat.isGroup ? chat.group.id : chat.contact.id,
	// 			recvId: localStorage.getItem('complain'),
	// 			recvIsGroup: false,
	// 			is_complain: 1
	// 		};

	// 		sendMessageCCStart(msg);

	// 		if (localStorage.getItem("complain_channel") == '2') {
	// 			// console.log('ccs: ' + localStorage.getItem('complainID'));
	// 			let joinCommand = 'palio:' + localStorage.getItem('api_key') + '+' + user.id + '+ccs+' + localStorage.getItem('complainID') + '+' + user.id + '+' + localStorage.complain + '+1';

	// 			checkCustomProtocol(joinCommand, 200);
	// 			sendCallCCNotif(localStorage.getItem('complain'), data.data, 1);
	// 			let tBDelay = new Date().getTime() - tB;
	// 			console.log("CALLCC called <- CMP_ID get " + tBDelay);

	// 		} else if (localStorage.getItem("complain_channel") == '1') {
	// 			// console.log('ccs: ' + localStorage.getItem('complainID'));
	// 			let joinCommand = 'palio:' + localStorage.getItem('api_key') + '+' + user.id + '+ccs+' + localStorage.getItem('complainID') + '+' + user.id + '+' + localStorage.complain + '+0';
	// 			checkCustomProtocol(joinCommand, 200);
	// 			sendCallCCNotif(localStorage.getItem('complain'), data.data, 0);
	// 		}

	// 		// if (localStorage.getItem("complain_channel") == '2') {
	// 		// 	// console.log('ccs: ' + localStorage.getItem('complainID'));
	// 		// 	let joinCommand = 'palio:' + localStorage.getItem('api_key') + '+' + user.id + '+ccs+' + localStorage.getItem('complainID') + '+' + user.id + '+' + localStorage.complain + '+1';
	// 		// 	checkCustomProtocol(joinCommand, 200);

	// 		// } else if (localStorage.getItem("complain_channel") == '1') {
	// 		// 	// console.log('ccs: ' + localStorage.getItem('complainID'));
	// 		// 	let joinCommand = 'palio:' + localStorage.getItem('api_key') + '+' + user.id + '+ccs+' + localStorage.getItem('complainID') + '+' + user.id + '+' + localStorage.complain + '+0';
	// 		// 	checkCustomProtocol(joinCommand, 200);
	// 		// }
	// 		// document.getElementById(custfpin).click();
	// 		// isOngoingCC = true;

	// 	}
	// }
	// xmlHttp.open("get", "/chatcore/logics/accept_complain?f_pin=" + localStorage.F_PIN + "&customer_fpin=" + localStorage.complain + "&ch=" + localStorage.getItem("complain_channel"));
	// xmlHttp.send();

	// mClassList(DOM.complainModal).remove('d-block');
	// mClassList(DOM.complainModal).add('d-none');

	// // document.getElementById(custfpin).click();
	// // generateMessageArea(null, custfpin, true, false);
});

// rej complain
DOM.complainRej.addEventListener("click", () => {
	// open xhr
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// // console.log(xmlHttp.responseText);
		}
	};
	xmlHttp.open("get", "/chatcore/logics/reject_complain?f_pin=" + localStorage.F_PIN + "&customer_fpin=" + localStorage.complain + "&acc=" + 0);
	xmlHttp.send();

	mClassList(DOM.complainModal).remove("d-block");
	mClassList(DOM.complainModal).add("d-none");
});

let disableBroadcast = false;

let sendBroadcast = () => {
	let from = user.id;
	let title = DOM.broadcastTitle.value;
	let mode = DOM.broadcastMode.value;
	let message = DOM.broadcastMessage.value;
	// let start = bcStart.toString();
	let start = combineStartTime();
	let end = "";
	let target = DOM.broadcastTarget.value;
	let data = "";
	let category = "0";
	let type = DOM.broadcastType.value;
	let link = DOM.broadcastLink.value;
	let surveyId = DOM.broadcastSurvey.value;

	let formData = new FormData();
	formData.append("from", from);
	formData.append("title", title);
	formData.append("message", message);
	formData.append("mode", mode);
	formData.append("link", link);
	formData.append("type", type);
	formData.append("start", start);
	formData.append("target", target);
	formData.append("survey_id", surveyId);

	if (DOM.broadcastFile.files.length !== 0) {
		let file = DOM.broadcastFile.files[0];

		if (isImage(getExtension(file.name))) {
			category = "1";
			hex = Date.now().toString(16);
			formData.append("file", file);
			formData.append("hex", hex);
		} else if (isVideo(getExtension(file.name))) {
			category = "2";
			hex = Date.now().toString(16);
			formData.append("file", file, file.name);
			formData.append("hex", hex);
			var canvas = document.createElement("canvas");
			var video = document.createElement("video");
			var fullQuality = "";
			video.src = URL.createObjectURL(file);
			video.addEventListener("canplay", function () {
				canvas.getContext("2d").drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
				fullQuality = canvas.toDataURL("image/jpeg", 1.0);

				fetch(fullQuality)
					.then((res) => res.blob())
					.then((blob) => {
						const thumbnailVideo = new File([blob], "image.jpg", {
							type: "image/jpeg",
						});
						formData.append("thumbnail", thumbnailVideo, thumbnailVideo.name);
					});
			});
		} else if (!isImage(getExtension(file.name)) && !isVideo(getExtension(file.name)) && !isAudio(getExtension(file.name))) {
			category = "3"; // document
			hex = Date.now().toString(16);
			formData.append("file", file);
			formData.append("hex", hex);
		} else {
			alert("file type not allowed");
		}
	}

	formData.append("category", category);

	let startDateFlag = true;
	let endDateFlag = true;
	let titleFlag = true;
	let messageFlag = true;
	let selectedGroupFlag = true;
	let selectedParticipantFlag = true;

	if (target === "4") {
		if (selectedGroup.length > 0) {
			data = JSON.stringify(selectedGroup);
			formData.append("data", data);
		} else {
			selectedGroupFlag = false;
		}
	} else if (target === "5") {
		if (selectedParticipant.length > 0) {
			data = JSON.stringify(selectedParticipant);
			formData.append("data", data);
		} else {
			selectedParticipantFlag = false;
		}
	}

	if (startDateTimeStr === "") {
		startDateFlag = false;
	}

	if (mode !== "1") {
		end = combineEndTime();
		if (end !== "") {
			formData.append("end", end);
		} else {
			endDateFlag = false;
		}
	}

	if (message.trim() === "") {
		messageFlag = false;
	}

	if (title.trim() === "") {
		titleFlag = false;
	}

	disableBroadcast = true;

	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// // console.log(xmlHttp.responseText);

			$("#broadcast-modal").modal("hide");
			$("#broadcast-modal-result").modal("show");
			DOM.broadcastForm.reset();
			disableBroadcast = false;
		}
	};
	if (startDateFlag && endDateFlag && selectedParticipantFlag && selectedGroupFlag && titleFlag && messageFlag) {
		xmlHttp.open("post", "/chatcore/logics/digisales/send_broadcast");
		xmlHttp.send(formData);
		// for (var pair of formData.entries()) {
		// 	console.log(pair[0]+ ', ' + pair[1]); 
		// }
	} else {
		alert("Please complete your broadcast form first");
	}
};

let broadcastSeminar = () => {
	let title = DOM.broadcastTitle.value;
	let message = DOM.broadcastMessage.value;
	let category = "0";
	let data = "";
	let type = DOM.broadcastType.value;
	let target = DOM.broadcastTarget.value;
	let start = new Date().getTime().toString();

	let titleFlag = true;
	let messageFlag = true;
	let selectedGroupFlag = true;
	let selectedParticipantFlag = true;

	let formData = new FormData();
	formData.append("from", "-999");
	formData.append("title", title);
	formData.append("message", message);
	formData.append("link", "");
	formData.append("type", type);
	formData.append("target", target);
	formData.append("survey_id", "");
	formData.append("category", category);
	formData.append("start", start);
	formData.append("end", "");

	if (target === "4") {
		if (selectedGroup.length > 0) {
			data = JSON.stringify(selectedGroup);
			formData.append("data", data);
		} else {
			selectedGroupFlag = false;
		}
	} else if (target === "5") {
		if (selectedParticipant.length > 0) {
			data = JSON.stringify(selectedParticipant);
			formData.append("data", data);
		} else {
			selectedParticipantFlag = false;
		}
	}

	if (message.trim() === "") {
		messageFlag = false;
	}

	if (title.trim() === "") {
		titleFlag = false;
	}

	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// // console.log(xmlHttp.responseText);

			$("#ss-session").modal("hide");
			// $('#broadcast-modal-result').modal('show');
			DOM.broadcastForm.reset();

			let roomName = title;
			let joinCommand = "palio:" + localStorage.getItem("api_key") + "+" + user.id + "+vcr+" + roomName;

			checkCustomProtocol(joinCommand, 200);
		}
	};
	if (selectedParticipantFlag && selectedGroupFlag && titleFlag && messageFlag) {
		xmlHttp.open("post", "/chatcore/logics/digisales/send_broadcast");
		xmlHttp.send(formData);
		// console.log("sent")
	} else {
		alert("Please complete your form first");
	}
};

DOM.submitBroadcast.addEventListener("click", () => {
	if (localStorage.getItem("ss_choice") == null) {
		if (disableBroadcast == false) {
			sendBroadcast();
		} else {
			// do nothing
		}
	} else {
		if (localStorage.getItem("ss_choice") == 0) {
			// seminar
			// broadcastSeminar();
			let roomName = title;
			let joinCommand = "palio:" + localStorage.getItem("api_key") + "+" + user.id + "+lbi+" + roomName;

			checkCustomProtocol(joinCommand, 200);
		} else if (localStorage.getItem("ss_choice") == 1) {
			// streaming
			// broadcastSeminar();
			let roomName = title;
			let joinCommand = "palio:" + localStorage.getItem("api_key") + "+" + user.id + "+lbi+" + roomName;

			checkCustomProtocol(joinCommand, 200);
		} else if (localStorage.getItem("ss_choice") == 2) {
			broadcastCreateVC();
		}
	}
});

DOM.closeBroadcast.addEventListener("click", () => {
	DOM.broadcastForm.reset();
});

let finishComplain = () => {
	// open xhr
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// // console.log(xmlHttp.responseText);

			localStorage.removeItem("complainID");
			localStorage.removeItem("complain");
			localStorage.removeItem("complain_name");
			localStorage.removeItem("complain_channel");
			// localStorage.complainID = null;

			alert("Contact center session has ended.");
			document.location.reload(true);
			isOngoingCC = false;
		}
	};
	xmlHttp.open("get", "/chatcore/logics/finish_complain?f_pin=" + localStorage.F_PIN + "&customer_fpin=" + localStorage.destination + "&complain_id=" + localStorage.complainID);
	xmlHttp.send();
};

let checkComplain = () => {
	// open xhr
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// // // console.log(xmlHttp.responseText);
			// return xmlHttp.responseText;

			let data = JSON.parse(xmlHttp.responseText);

			if (data != 0) {
				localStorage.setItem("complainID", data.ID);
			}
		}
	};
	xmlHttp.open("get", "/chatcore/logics/check_complain?customer_id=" + localStorage.F_PIN);
	xmlHttp.send();
};

let checkComplainStatus = (c_id) => {
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// // // console.log(xmlHttp.responseText);
			// return xmlHttp.responseText;

			let data = JSON.parse(xmlHttp.responseText);
			if (data.STATUS === 2) {
				localStorage.removeItem("complainID");
				// localStorage.complainID = null;
				alert("Contact center session has ended");
				document.location.reload();
			}
		}
	};
	xmlHttp.open("get", "/chatcore/logics/fetch_complaint_status?comp_id=" + c_id);
	xmlHttp.send();
};

DOM.ccHistory.addEventListener("click", () => {
	showComplaintHistory();
	$("#cc-staff").modal("hide");
});

// document.getElementById('open-ss').addEventListener("click", () => {
// 	$('#ss-session').modal('toggle');

// 	fillGroupDataList();
// 	fillParticipantDataList();

// 	$('#ss-seminar').click(function() {
// 		$('#ss-session').modal('toggle');
// 		$('#broadcast-modal').modal('toggle');
// 		localStorage.setItem('ss_choice', 0);
// 		$("#exampleModalLabel").text("Seminar");
// 	});

// 	$('#ss-streaming').click(function() {
// 		$('#broadcast-modal').modal('toggle');
// 		$('#ss-session').modal('toggle');
// 		localStorage.setItem('ss_choice', 1);
// 		$("#exampleModalLabel").text("Streaming");
// 	});

// 	$("#form-start-date").addClass("d-none");
// 	$("#form-broadcast-file").addClass("d-none");
// 	$("#form-broadcast-link").addClass("d-none");
// 	$("#form-broadcast-survey").addClass("d-none");
// 	$("#form-broadcast-mode").addClass("d-none");

// });

// document.getElementById("open-vc").addEventListener("click", function () {

// 	localStorage.setItem("ss_choice", 2);

// 	let now = new Date();

// 	let day = ("0" + now.getDate()).slice(-2);
// 	let month = ("0" + (now.getMonth() + 1)).slice(-2);

// 	let today = now.getFullYear() + "-" + month + "-" + day;

// 	let hour = ("0" + now.getHours()).slice(-2);
// 	let min = ("0" + now.getMinutes()).slice(-2);

// 	let time = hour + ":" + min;

// 	DOM.broadcastStartDate.value = today;
// 	startDateTimeStr = today + " " + time;
// 	DOM.broadcastStartTime.value = time;

// 	$("#exampleModalLabel").text("Video Conference Room");

// 	$("#form-target-audience").addClass("d-none");
// 	$("#form-participants").removeClass("d-none");
// 	$("#form-broadcast-type").addClass("d-none");
// 	$("#form-broadcast-msg").addClass("d-none");
// 	$("#form-broadcast-file").addClass("d-none");
// 	$("#form-broadcast-link").addClass("d-none");
// 	$("#form-broadcast-survey").addClass("d-none");
// 	$("#form-broadcast-mode").addClass("d-none");

	
// 	$("#broadcast-modal").modal("toggle");

// 	$("#submit-broadcast").text("Create");
// });

let broadcastCreateVC = () => {
	let from = user.id;
	let title = DOM.broadcastTitle.value;
	let start = combineStartTime();
	//   let memberList = JSON.stringify;
	let conf_id = user.id + new Date().getTime().toString();

	let conf_data = {
		title: title,
		by: user.id,
		time: start,
		members: selectedParticipant,
	};

	console.log(JSON.stringify(conf_data));

	let formData = new FormData();
	formData.append("from", from);
	formData.append("conference_data", JSON.stringify(conf_data));
	formData.append("conference_id", conf_id);

	let vcrTitle = title != "";
	let selectedParticipantFlag = selectedParticipant.length > 0;

	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// // console.log(xmlHttp.responseText);

			// let roomName = DOM.vcRoomName.value;
			let joinCommand = "palio:" + localStorage.getItem("api_key") + "+" + user.id + "+vcr+" + conf_id;

			checkCustomProtocol(joinCommand, 200);

			selectedParticipant = [];
			$("#broadcast-modal").modal("hide");
			// $('#broadcast-modal-result').modal('show');
			DOM.broadcastForm.reset();
		}
	};
	if (selectedParticipantFlag && vcrTitle) {
		xmlHttp.open("post", "/chatcore/logics/start_video_conf");
		xmlHttp.send(formData);
		console.log("sent");
	} else {
		alert("Please complete your form first");
	}
};

// DOM.createVC.addEventListener('click', () => {
// 	let roomName = DOM.vcRoomName.value;
// 	let joinCommand = 'palio:' + localStorage.getItem('api_key') + '+' + user.id + '+vcr+' + roomName;

// 	checkCustomProtocol(joinCommand, 200);
// });

// DOM.joinVC.addEventListener('click', () => {
// 	let roomName = DOM.vcRoomName.value;
// 	let joinCommand = 'palio:' + localStorage.getItem('api_key') + '+' + user.id + '+vjr+' + roomName;

// 	checkCustomProtocol(joinCommand, 200);
// });

DOM.callCCAcc.addEventListener("click", () => {
	mClassList(DOM.callCCModal).remove("d-block");
	mClassList(DOM.callCCModal).add("d-none");
	let camOn = parseInt(localStorage.getItem("complain_channel")) - 1;
	let joinCommand = "palio:" + localStorage.getItem("api_key") + "+" + user.id + "+csa+" + localStorage.getItem("complainID") + "+" + camOn.toString();
	checkCustomProtocol(joinCommand, 200);

	// hit API to user accept call + remove notification
	let formData = new FormData();
	formData.append("cmp_id", localStorage.getItem("call_complain_ID"));

	var xmlHttp = new XMLHttpRequest();
	var url = "/chatcore/logics/remove_call_notif";
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// console.log(xmlHttp.responseText);
		}
	};

	xmlHttp.open("post", url);
	xmlHttp.send(formData);
});

DOM.callCCRej.addEventListener("click", () => {
	mClassList(DOM.callCCModal).remove("d-block");
	mClassList(DOM.callCCModal).add("d-none");

	// hit API to user reject call + remove notification
	let formData = new FormData();
	formData.append("cmp_id", localStorage.getItem("call_complain_ID"));

	var xmlHttp = new XMLHttpRequest();
	var url = "/chatcore/logics/remove_call_notif";
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			// console.log(xmlHttp.responseText);
		}
	};
	xmlHttp.open("post", url);
	xmlHttp.send(formData);

	alert("Call Rejected.");
	mClassList(DOM.callCCModal).remove("d-block");
	mClassList(DOM.callCCModal).add("d-none");
});

DOM.deleteConversation.addEventListener("click", () => {
	if (confirm("Delete conversation?")) {
		let fd = new FormData();

		fd.append("from", user.id);
		fd.append("flag", localStorage.FLAG);

		if (!chat.isGroup) {
			fd.append("to", chat.contact.id);
			fd.append("scope", "3");
			fd.append("chat_id", "");
		} else {
			if (chat.is_topic) {
				fd.append("chat_id", chat.group.id);
				fd.append("to", chat.group.group_id);
			} else {
				fd.append("chat_id", "");
				fd.append("to", chat.group.id);
			}
			fd.append("scope", "4");
		}

		let xhr = new XMLHttpRequest();
		let url = "/chatcore/logics/delete_conversation";
		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4 && xhr.status == 200) {
				// if (xhr.responseText == "Conversation deleted") {
				// // xhr.log(xhr.responseText);
				alert("Conversation deleted");
				location.reload();
				// }
				// // console.log(xhr.responseText);
			}
		};
		xhr.open("post", url);
		xhr.send(fd);
	} else {
		return;
	}
});

var replyTo;
var isReply = false;

// let temp_sender_name = "";
let replyMessage = (msg_id) => {
	event.preventDefault();

	document.getElementById("input").focus();

	let message = messages.find((el) => el.id === msg_id);
	let isInContactList = contactList.some((el) => el.id === message.sender);
	let friend = "";

	let filetype = "";

	if (message.file_id != "") {
		if (isImage(getExtension(message.file_id))) {
			filetype = "image";
		} else if (isAudio(getExtension(message.file_id))) {
			filetype = "audio";
		} else if (isVideo(getExtension(message.file_id))) {
			filetype = "video";
		} else {
			filetype = "file";
		}
	}

	if (message.sender == user.id) {
		friend = "You";
	} else {
		if (isInContactList) {
			friend = contactList.find((el) => el.id === message.sender).name;
		} else {
			friend = $("#msg-" + msg_id + " .small.text-primary.group-username").html();
			// temp_sender_name = friend;
		}
	}

	document.getElementById("document").classList.remove("d-none");

	let filePreview = "<span style='margin-left: 10px;'><b>Attachment " + filetype + "</b></span><hr>";

	document.getElementById("preview-img").innerHTML = `${filetype != "" ? filePreview : ""}<span style='margin:10px; width: auto;'>${friend} : </span>`;

	if (message.body == "") {
		document.getElementById("document-name").innerHTML = message.file_id;
	} else {
		document.getElementById("document-name").innerHTML = richText(message.body);
	}

	isReply = true;
	replyTo = msg_id;
};

// to highlight chat
let highlightChat = (msg_id) => {
	let msg = document.getElementById(msg_id);
	msg.style.border = "5px solid #dcf8c6";
	let count = 1;
	msg.scrollIntoView({
		behavior: "smooth",
		block: "start",
		inline: "nearest",
	});
	setTimeout(function() {
		msg.style.border = "0px";
	}, 2000)
	// let intervalId = setInterval(function () {
	// 	if (msg.style.visibility == "hidden") {
	// 		msg.style.visibility = "visible";
	// 		if (count++ === 3) {
	// 			clearInterval(intervalId);
	// 			msg.style.border = "0px solid #dcf8c6";
	// 		}
	// 	} else {
	// 		msg.style.visibility = "hidden";
	// 	}
	// }, 200);
};

// contact info group member
let contactInfo = (user_id) => {
	// find user
	let user = contactList.find((contact) => contact.id == user_id);

	// if targeted user is not a friend
	if (user == undefined) {
		alert("This user is not your friend yet.");
		return;
	}

	DOM.messageArea.classList.remove("col-md-8");
	DOM.messageArea.classList.add("col-md-4");
	mClassList(DOM.infoArea).remove("d-none").add("d-flex");

	if (window.innerWidth <= 575) {
		mClassList(DOM.messageArea).remove("d-flex").add("d-none");
	}

	DOM.infoArea.style.left = 0;

	DOM.personGroup.innerHTML = "Contact Info";
	DOM.personProfPic.src = user.pic;
	DOM.personName.value = user.name;
	DOM.membersSection.innerHTML = "";

	if (user.id == localStorage.cc_alias_fpin) {
		DOM.personLabel.innerHTML = '<i class="fas fa-check-circle" style="color:#306EFF;"></i> Official';
	} else if (user.isStaff == "1") {
		DOM.personLabel.innerHTML = '<i class="fas fa-user"></i> Contact Center';
	} else if (user.user_type == 23) {
		DOM.personLabel.innerHTML = '<i class="fas fa-check-circle" style="color:red;"></i> Admin';
	}
};

// create subgroup button
function createSubgroupButton() {
	// check if the current user is the creator of the group
	if (chat.group.created_by != user.id) {
		return;
	}

	let button = document.getElementById("create-subgroup");
	button.classList.remove("d-none");
}

// submit new subgroup
function submitNewSubgroup() {
	let formData = new FormData();
	formData.append("from", user.id);
	formData.append("group_id", chat.group.id);
	formData.append("subgroup_name", document.getElementById("create-subgroup-name").value);

	var xhr = new XMLHttpRequest();

	xhr.addEventListener("readystatechange", function () {
		if (this.readyState === 4) {
			// close create group input
			$("#create-subgroup-modal").modal("toggle");

			// pop create group result
			$("#create-subgroup-result").modal("toggle");
			document.getElementById("create-subgroup-result-text").innerHTML = this.responseText;
		}
	});

	xhr.open("POST", "/chatcore/logics/submit_create_subgroup.php", false);
	xhr.send(formData);
}