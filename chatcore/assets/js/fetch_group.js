function fetchGroup(dir) {
    // var formData = new FormData();
    // formData.append('f_pin', localStorage.F_PIN);

    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            // get friends lpins
            data = JSON.parse(xmlHttp.responseText);

            for (const d of data) {
                let img;

                // var root = 'https://' + location.host;
                var root = 'https://qmera.io';

                if (d.IMAGE_ID == null) {
                    img = "/chatcore/assets/img/cuc_groupicon.png";
                } else {
                    img = root + dir + d.IMAGE_ID;
                }

                let grp = {
                    id: d.GROUP_ID,
                    name: d.GROUP_NAME,
                    quote: d.QUOTE,
                    pic: img,
                    last_update: d.LAST_UPDATE,
                    parent: d.PARENT_ID,
                    is_open: d.IS_OPEN,
                    is_organization: d.IS_ORGANIZATION,
                    created_by: d.CREATED_BY,
                }

                let isGroupExist = groupList.some(el => el.id === d.GROUP_ID);

                if (!isGroupExist) {
                    groupList.push(grp);
                }

                fetchSubgroup(d.GROUP_ID, dir);
            }
        }
    }
    xmlHttp.open("get", "/chatcore/logics/fetch_group?f_pin=" + localStorage.F_PIN + "&flag=" + localStorage.FLAG);
    xmlHttp.send();
}